function out = Jan930(varargin)
    out = local_Jan930(varargin{:});
end
function out = local_Jan930(varargin)
    [D, opts] = parse_inputs(varargin{:});
    if ~isempty(opts.seed)
        try
            rng(opts.seed, 'twister');
        catch
            rng(opts.seed);
        end
    end
    D = finalize_dataset(D, opts);
    validate_jan930_inputs(D, opts);
    if opts.useDualTPE && has_forecasts(D)
        predictions = generate_predictions(D.PV, D.WT, D.LD, opts.prediction);
        D = apply_prediction_modulation(D, predictions);
    else
        predictions = struct();
        D = ensure_default_modulation(D);
    end
    optim = run_all_methods(D, opts);
    cases = compute_case_metrics(D, optim);
    tables = ternary(opts.tables, build_tables(D, predictions, optim, cases), struct());
    out = struct();
    out.best       = optim.best;
    out.methods    = optim.methods;
    out.order      = optim.order;
    out.nP         = optim.nP;
    out.it         = optim.it;
    out.prediction = predictions;
    out.cases      = cases;
    out.tables     = tables;
    out.audit      = build_audit_payload(D, opts, predictions, optim, cases, tables);
    if opts.plots
        plot_outputs(D, predictions, cases, optim);
    end
end
function [D, opts] = parse_inputs(varargin)
    if nargin >= 1 && isstruct(varargin{1})
        D = varargin{1};
        args = varargin(2:end);
    else
        defaults = struct('nb', 33, 'T', 96, 'V0', 1.0, 'PF', [0.9 1.0]);
        assert(mod(nargin,2)==0, 'Name/value pairs expected.');
        for k = 1:2:nargin
            defaults.(lower(string(varargin{k}))) = varargin{k+1};
        end
        D = make_default_dataset(defaults);
        args = {};
    end
    opts = default_options();
    assert(mod(numel(args),2)==0, 'Options must be key/value pairs.');
    for k = 1:2:numel(args)
        key = args{k};
        val = args{k+1};
        if isfield(opts, key)
            opts.(key) = val;
        else
            opts.extra.(key) = val;
        end
    end
end
function opts = default_options()
    opts = struct();
    opts.methods     = {'HYB'};
    opts.nP          = [];
    opts.it          = [];
    opts.includePSO  = false;
    opts.seed        = [];
    opts.plots       = false;
    opts.twoStage    = true;
    opts.tables      = true;
    opts.w           = [];
    opts.bias        = [];
    opts.useDualTPE  = true;
    opts.prediction  = struct('val_frac',0.20,'hidden',16,'ridge',1e-3,'ewma',0.2);
    opts.extra       = struct();
end
function D = make_default_dataset(params)
    nb = params.nb;
    T = params.T;
    V0 = params.V0;
    PF = params.PF;
    Sbase = getfield_def(params,'Sbase',100);
    Vll   = getfield_def(params,'Vll',12.66);
    [R_ohm, X_ohm, nBranches] = feeder_data(nb);
    Zb = (Vll^2) / Sbase;
    R = R_ohm ./ Zb;
    X = X_ohm ./ Zb;
    Ia = 0.5 * ones(T, numel(R));
    Ir = zeros(T, numel(R));
    D = struct('R',R,'X',X,'Ia',Ia,'Ir',Ir,'V0',V0,'PF',PF);
    D.Sbase_MVA = Sbase;
    D.Vll_kV = Vll;
    D.nb = nb;
    D.nBranches = nBranches;
    D.mf = ones(T, numel(R));
    D.mfPV = D.mf;
    D.mfWT = D.mf;
end
function [R_ohm, X_ohm, nBranches] = feeder_data(nb)
    switch nb
        case 33
            R_ohm = [0.0922 0.4930 0.3660 0.3811 0.8190 0.1872 1.7114 1.0300 ...
                     1.0440 0.1966 0.3744 1.4680 0.5416 0.5910 0.7463 1.2890 ...
                     0.7320 0.1640 1.5042 0.4095 0.7089 0.4512 0.8980 0.8960 ...
                     0.2030 0.2842 1.0590 0.8042 0.5075 0.9744 0.3105 0.3410];
            X_ohm = [0.0477 0.2511 0.1864 0.1941 0.7070 0.6188 1.2351 0.7400 ...
                     0.7400 0.0650 0.1238 1.1550 0.7129 0.5260 0.5450 1.7210 ...
                     0.5740 0.1565 1.3554 0.4784 0.9373 0.3083 0.7091 0.7011 ...
                     0.1034 0.1447 0.9337 0.7006 0.2585 0.9630 0.3619 0.5302];
        case 69
            R_ohm = [0.0005 0.0005 0.0015 0.0005 0.0005 0.0010 0.0005 0.0020 ...
                     0.0005 0.0020 0.0005 0.0010 0.0020 0.0005 0.0015 0.0005 ...
                     0.0005 0.0010 0.0020 0.0005 0.0005 0.0010 0.0005 0.0020 ...
                     0.0005 0.0020 0.0005 0.0010 0.0020 0.0005 0.0005 0.0010 ...
                     0.0005 0.0020 0.0005 0.0020 0.0005 0.0010 0.0020 0.0005 ...
                     0.0005 0.0010 0.0005 0.0020 0.0005 0.0020 0.0005 0.0010 ...
                     0.0020 0.0005 0.0005 0.0010 0.0005 0.0020 0.0005 0.0020 ...
                     0.0005 0.0010 0.0020 0.0005 0.0005 0.0010 0.0005 0.0020 ...
                     0.0005 0.0020 0.0005 0.0010];
            X_ohm = [0.0012 0.0012 0.0036 0.0012 0.0012 0.0025 0.0012 0.0049 ...
                     0.0012 0.0049 0.0012 0.0025 0.0049 0.0012 0.0036 0.0012 ...
                     0.0012 0.0025 0.0049 0.0012 0.0012 0.0025 0.0012 0.0049 ...
                     0.0012 0.0049 0.0012 0.0025 0.0049 0.0012 0.0012 0.0025 ...
                     0.0012 0.0049 0.0012 0.0049 0.0012 0.0025 0.0049 0.0012 ...
                     0.0012 0.0025 0.0012 0.0049 0.0012 0.0049 0.0012 0.0025 ...
                     0.0049 0.0012 0.0012 0.0025 0.0012 0.0049 0.0012 0.0049 ...
                     0.0012 0.0025 0.0049 0.0012 0.0012 0.0025 0.0012 0.0049 ...
                     0.0012 0.0049 0.0012 0.0025];
        otherwise
            error('Only IEEE-33 and IEEE-69 feeders are provided.');
    end
    nBranches = numel(R_ohm);
end
function D = finalize_dataset(D, opts)
    if ~isfield(D,'Sbase_MVA'), D.Sbase_MVA = 100; end
    if ~isfield(D,'Vll_kV'),   D.Vll_kV   = 12.66; end
    if ~isfield(D,'Im_max'),   D.Im_max   = 2.0; end
    if ~isfield(D,'dt'),       D.dt       = 1.0; end
    if ~isfield(D,'nBranches') || isempty(D.nBranches)
        D.nBranches = numel(D.R);
    end
    if ~isfield(D,'nb') || isempty(D.nb)
        D.nb = D.nBranches + 1;
    end
    if ~isfield(D,'mf'),       D.mf       = ones(size(D.Ia)); end
    if ~isfield(D,'mfPV'),     D.mfPV     = D.mf; end
    if ~isfield(D,'mfWT'),     D.mfWT     = D.mf; end
    if ~isfield(D,'Vmin'),     D.Vmin     = 0.95; end
    if ~isfield(D,'Vmax'),     D.Vmax     = 1.05; end
    if ~isempty(opts.w)
        D.w = opts.w(:)';
    else
        switch lower(string(getfield_def(opts,'bias','standard')))
            case {"loss","loss-first"}
                D.w = [0.7 0.2 0.1];
            case {"voltage","quality"}
                D.w = [0.4 0.2 0.4];
            otherwise
                D.w = [0.6 0.2 0.2];
        end
    end
    F = getfield_def(opts.extra,'forecasts',[]);
    if isstruct(F) && all(isfield(F, {'PV','WT','LD'}))
        D = wire_forecasts(D, F);
    end
    D = ensure_timebase(D);
end
function tf = has_forecasts(D)
    tf = isfield(D,'PV') && isfield(D,'WT') && isfield(D,'LD') ...
        && ~isempty(D.PV) && ~isempty(D.WT) && ~isempty(D.LD);
end
function D = ensure_default_modulation(D)
    Nb1 = numel(D.R);
    T = size(D.Ia,1);
    if ~isfield(D,'mf') || isempty(D.mf)
        D.mf = ones(T, Nb1);
    end
    if ~isfield(D,'mfPV') || isempty(D.mfPV)
        D.mfPV = repmat(D.mf(:,1),1,Nb1);
    end
    if ~isfield(D,'mfWT') || isempty(D.mfWT)
        D.mfWT = repmat(D.mf(:,1),1,Nb1);
    end
end
function D = wire_forecasts(D, F)
    PV = F.PV(:);
    WT = F.WT(:);
    LD = F.LD(:);
    T  = size(D.Ia,1);
    Nb1 = numel(D.R);
    assert(numel(PV)==T && numel(WT)==T && numel(LD)==T, ...
        'Forecast length must equal simulation horizon.');
    D.PV = max(PV,0);
    D.WT = max(WT,0);
    D.LD = max(LD,0);
    D.mfPV = repmat(scale_series(D.PV),1,Nb1);
    D.mfWT = repmat(scale_series(D.WT),1,Nb1);
    D.mf   = repmat(scale_series(D.LD),1,Nb1);
end
function D = ensure_timebase(D)
    T = size(D.Ia,1);
    if ~isfield(D,'t_hours') || isempty(D.t_hours)
        D.t_hours = (0:T-1)' * getfield_def(D,'dt',1.0);
    end
end
function predictions = generate_predictions(PV, WT, LD, cfg)
    predictions = struct();
    predictions.PV = sequence_predict(PV, PV+WT, cfg);
    predictions.WT = sequence_predict(WT, PV+WT, cfg);
    predictions.LD = sequence_predict(LD, PV+WT, cfg);
    predictions.metrics = build_prediction_table(PV, WT, LD, predictions);
end
function S = sequence_predict(y, aux, cfg)
    y = fillmissing(y(:),'linear','EndValues','nearest');
    aux = fillmissing(aux(:),'linear','EndValues','nearest');
    y(y<0) = 0; aux(aux<0)=0;
    N = numel(y);
    x1 = normalize_series(y);
    x2 = normalize_series(aux);
    X  = [x1 x2];
    H = cfg.hidden;
    sf = @(z) 1./(1+exp(-z));
    tf = @tanh;
    rng(42 + N);
    Wf = randn(H,2); Wi = randn(H,2); Wc = randn(H,2); Wo = randn(H,2);
    Uf = randn(H,H); Ui = randn(H,H); Uc = randn(H,H); Uo = randn(H,H);
    bf = zeros(H,1); bi = zeros(H,1); bc = zeros(H,1); bo = zeros(H,1);
    h = zeros(H,1); c = zeros(H,1);
    Hs = zeros(H,N);
    for t = 1:N
        xt = X(t,:)';
        f = sf(Wf*xt + Uf*h + bf);
        i = sf(Wi*xt + Ui*h + bi);
        g = tf(Wc*xt + Uc*h + bc);
        c = f.*c + i.*g;
        o = sf(Wo*xt + Uo*h + bo);
        h = o .* tf(c);
        Hs(:,t) = h;
    end
    Phi = [Hs' ones(N,1)];
    ridge = cfg.ridge;
    w = (Phi' * Phi + ridge * eye(size(Phi,2))) \ (Phi' * y);
    y_lstm = Phi * w;
    auxLag = [aux(1); aux(1:end-1)];
    Phi2 = [Hs' normalize_series(auxLag) ones(N,1)];
    w2 = (Phi2' * Phi2 + ridge * eye(size(Phi2,2))) \ (Phi2' * y);
    y_dual = Phi2 * w2;
    y_tpe_raw = 0.5 * y_dual + 0.5 * y_lstm;
    [y_tpe, ~] = ewma_series(y_tpe_raw, cfg.ewma);
    y_blstm = movmean(y_lstm, max(3, round(0.02 * N)));
    S = struct('LSTM',max(y_lstm,0), ...
               'Dual', max(y_dual,0), ...
               'TPE',  max(y_tpe,0), ...
               'BLSTM',max(y_blstm,0));
end
function tableStruct = build_prediction_table(PV, WT, LD, predictions)
    tableStruct = struct();
    tableStruct.headers = {'Series','Model','MAPE','MAE','RMSE'};
    tableStruct.rows = [prediction_rows('PV', PV, predictions.PV); ...
                        prediction_rows('WT', WT, predictions.WT); ...
                        prediction_rows('LD', LD, predictions.LD)];
end
function rows = prediction_rows(name, truth, pred)
    models = fieldnames(pred);
    rows = cell(numel(models),5);
    truth = truth(:);
    for i = 1:numel(models)
        yhat = pred.(models{i})(:);
        rows{i,1} = name;
        rows{i,2} = models{i};
        rows{i,3} = mape(truth, yhat);
        rows{i,4} = mean(abs(truth - yhat));
        rows{i,5} = sqrt(mean((truth - yhat).^2));
    end
end
function val = mape(y, yhat)
    y = y(:);
    yhat = yhat(:);
    val = mean(abs(y - yhat) ./ max(abs(y),1e-6)) * 100;
end
function D = apply_prediction_modulation(D, predictions)
    Nb1 = numel(D.R);
    pv_hat = predictions.PV.TPE(:);
    wt_hat = predictions.WT.TPE(:);
    ld_hat = predictions.LD.TPE(:);
    D.PV_pred = pv_hat;
    D.WT_pred = wt_hat;
    D.LD_pred = ld_hat;
    D.mfPV = repmat(scale_series(pv_hat),1,Nb1);
    D.mfWT = repmat(scale_series(wt_hat),1,Nb1);
    D.mf   = repmat(scale_series(ld_hat),1,Nb1);
    D.pred_currents = convert_predictions_to_currents(D, pv_hat, wt_hat, ld_hat);
end
function pred_curr = convert_predictions_to_currents(D, pv_hat, wt_hat, ld_hat)
    Nb1 = numel(D.R);
    T = numel(pv_hat);
    pf_bounds = D.PF;
    pf_mid = mean(pf_bounds);
    alpha = tan(acos(pf_mid));
    scale = 1 ./ max(D.Sbase_MVA,1e-3);
    Ipv = (pv_hat * scale);
    Iwt = (wt_hat * scale);
    Ild = (ld_hat * scale);
    curr = struct();
    curr.active   = repmat(Ipv + Iwt - Ild, 1, Nb1);
    curr.reactive = alpha * curr.active;
    curr.voltage  = compute_voltage_profile(D, D.Ia, D.Ir);
end
function optim = run_all_methods(D, opts)
    alg = default_algo();
    nP = ternary(isempty(opts.nP), alg.nP, opts.nP);
    it = ternary(isempty(opts.it), alg.it, opts.it);
    methods = unique(upper(string(opts.methods)), 'stable');
    if opts.includePSO && ~any(methods == "PSO")
        methods(end+1) = "PSO"; %#ok<AGROW>
    end
    results = struct();
    order = strings(0,1);
    histories = struct();
    for m = methods(:)'
        switch char(m)
            case 'PSO'
                [res, hist] = run_pso_method(D, nP, it);
            case 'HYB'
                [res, hist] = run_eosa_pso(D, nP, it);
            case 'EOSA'
                [res, hist] = run_eosa_only(D, nP, it);
            case 'BPSO'
                [res, hist] = run_bpso_method(D, nP, it);
            otherwise
                warning('Unknown method %s ignored.', m);
                continue;
        end
        results.(char(m)) = res;
        histories.(char(m)) = hist.best(:);
        order(end+1,1) = string(m); %#ok<AGROW>
    end
    if isempty(order)
        error('No optimisation methods selected.');
    end
    [bestJ, idx] = min(arrayfun(@(k)results.(char(order(k))).J, 1:numel(order)));
    bestName = char(order(idx));
    optim = struct();
    optim.best     = results.(bestName);
    optim.methods  = results;
    optim.order    = cellstr(order);
    optim.nP       = nP;
    optim.it       = it;
    optim.history  = histories;
end
function alg = default_algo()
    alg = struct('nP', 25, 'it', 120, 'wmax',0.9,'wmin',0.4,'c1',1.6,'c2',1.6);
end
function [res, hist] = run_pso_method(D, nP, it)
    Nb = numel(D.R) + 1;
    bounds = [2 Nb; 0 D.Im_max; D.PF(1) D.PF(2)];
    obj = @(x) imo_objective(D, build_config(x));
    [best, hist] = continuous_pso(obj, bounds, nP, it);
    res = build_result('PSO', best, hist);
end
function [res, hist] = run_eosa_only(D, nP, it)
    [seed, hist] = continuous_pso(@(x) imo_objective(D, build_config(x)), ...
                                  [2 numel(D.R)+1; 0 D.Im_max; D.PF(1) D.PF(2)], ...
                                  max(4, round(nP/2)), max(10, round(it/3)));
    [cfg, trail] = eosa_refine(D, build_config(seed.x));
    hist.iterations = hist.iterations + trail.iterations;
    hist.best = [hist.best; trail.history(:)];
    res = build_result('EOSA', struct('x',cfg_vector(cfg),'f',trail.bestJ), hist);
end
function [res, hist] = run_eosa_pso(D, nP, it)
    [seed, hist] = continuous_pso(@(x) imo_objective(D, build_config(x)), ...
                                  [2 numel(D.R)+1; 0 D.Im_max; D.PF(1) D.PF(2)], ...
                                  nP, it);
    [cfg, trail] = eosa_refine(D, build_config(seed.x));
    hist.iterations = hist.iterations + trail.iterations;
    hist.best = [hist.best; trail.history(:)];
    res = build_result('HYB', struct('x',cfg_vector(cfg),'f',trail.bestJ), hist);
end
function [res, hist] = run_bpso_method(D, nP, it)
    Nb1 = numel(D.R);
    obj = @(mask) imo_objective(D, build_config_from_mask(mask));
    [best, hist] = binary_pso(obj, Nb1, nP, it);
    cfg = refine_bus_config(D, build_config_from_mask(best.x));
    val = imo_objective(D, cfg);
    hist.iterations = hist.iterations + cfg.meta.iterations;
    hist.best = [hist.best; cfg.meta.history(:)];
    res = build_result('BPSO', struct('x',cfg_vector(cfg), 'f',val), hist);
end
function res = build_result(name, best, hist)
    cfg = build_config(best.x);
    res = struct();
    res.method     = name;
    res.z          = cfg;
    res.J          = best.f;
    res.iterations = hist.iterations;
    res.history    = hist.best(:);
end
function cfg = build_config(x)
    cfg = struct('bus', round(x(1)), 'size', max(x(2),0), 'pf', max(min(x(3),1),0));
    cfg.type = 'pv';
end
function vec = cfg_vector(cfg)
    vec = [cfg.bus; cfg.size; cfg.pf];
end
function cfg = build_config_from_mask(mask)
    idx = find(mask>=0.5, 1, 'first');
    if isempty(idx)
        idx = 1;
    end
    cfg = struct('bus', idx+1, 'size', 0.5, 'pf', 0.95);
end
function cfg = refine_bus_config(D, cfg)
    cfgType = getfield_def(cfg,'type','pv');
    obj = @(v) imo_objective(D, struct('bus',cfg.bus,'size',v(1),'pf',v(2),'type',cfgType));
    bounds = [0 D.Im_max; D.PF(1) D.PF(2)];
    [best, hist] = continuous_pso(@(x)obj(x), bounds, 12, 40);
    cfg.size = best.x(1);
    cfg.pf   = best.x(2);
    cfg.meta = struct('iterations', hist.iterations, 'history', hist.best);
end
function [best, hist] = continuous_pso(obj, bounds, nP, it)
    d = size(bounds,1);
    L = bounds(:,1)';
    U = bounds(:,2)';
    alg = default_algo();
    X = rand(nP,d).* (U - L) + L;
    V = zeros(nP,d);
    F = zeros(nP,1);
    for i = 1:nP
        cfg = enforce_bounds(X(i,:), L, U);
        X(i,:) = cfg;
        F(i) = obj(cfg);
    end
    P = X; FP = F;
    [bestF, idx] = min(F);
    gbest = X(idx,:);
    hist.best = bestF;
    hist.iterations = 0;
    for t = 1:it
        w = alg.wmax - (alg.wmax - alg.wmin) * (t-1)/max(1,it-1);
        r1 = rand(nP,d); r2 = rand(nP,d);
        V = w*V + alg.c1*r1.*(P - X) + alg.c2*r2.*(gbest - X);
        X = X + V;
        hist.iterations = hist.iterations + 1;
        for i = 1:nP
            X(i,:) = enforce_bounds(X(i,:), L, U);
            val = obj(X(i,:));
            if val < FP(i)
                FP(i) = val;
                P(i,:) = X(i,:);
            end
            if val < bestF
                bestF = val;
                gbest = X(i,:);
            end
        end
        hist.best(end+1,1) = bestF; %#ok<AGROW>
    end
    best = struct('x', gbest, 'f', bestF);
end
function [best, hist] = binary_pso(obj, d, nP, it)
    alg = default_algo();
    X = rand(nP,d) > 0.5;
    V = zeros(nP,d);
    F = zeros(nP,1);
    for i = 1:nP
        F(i) = obj(X(i,:));
    end
    P = X; FP = F;
    [bestF, idx] = min(F);
    gbest = X(idx,:);
    hist.best = bestF;
    hist.iterations = 0;
    for t = 1:it
        w = alg.wmax - (alg.wmax - alg.wmin) * (t-1)/max(1,it-1);
        r1 = rand(nP,d); r2 = rand(nP,d);
        V = w*V + alg.c1*r1.*(P - X) + alg.c2*r2.*(gbest - X);
        X = rand(nP,d) < sigmoid(V);
        hist.iterations = hist.iterations + 1;
        for i = 1:nP
            val = obj(X(i,:));
            if val < FP(i)
                FP(i) = val; P(i,:) = X(i,:);
            end
            if val < bestF
                bestF = val; gbest = X(i,:);
            end
        end
        hist.best(end+1,1) = bestF; %#ok<AGROW>
    end
    best = struct('x', gbest, 'f', bestF);
end
function y = enforce_bounds(x, L, U)
    y = min(max(x, L), U);
end
function y = sigmoid(x)
    y = 1 ./ (1 + exp(-x));
end
function [cfg, trail] = eosa_refine(D, cfg)
    bestCfg = cfg;
    bestJ = imo_objective(D, bestCfg);
    history = bestJ;
    for step = 1:30
        cand = bestCfg;
        cand.size = max(0, cand.size + 0.1*randn());
        cand.pf   = min(max(cand.pf + 0.02*randn(), D.PF(1)), D.PF(2));
        cand.bus  = min(max(cand.bus + randi([-1 1]), 2), numel(D.R)+1);
        val = imo_objective(D, cand);
        if val < bestJ
            bestJ = val;
            bestCfg = cand;
        end
        history(end+1,1) = bestJ; %#ok<AGROW>
    end
    cfg = bestCfg;
    trail = struct('bestJ',bestJ,'history',history,'iterations',numel(history)-1);
end
function val = imo_objective(D, cfg)
    state = apply_resources(D, cfg);
    w = getfield_def(D,'w',[0.6 0.2 0.2]);
    PL = sum(state.PL);
    QL = sum(state.QL);
    VD = sum(state.VD);
    basePL = sum(state.PL0);
    baseQL = sum(state.QL0);
    baseVD = sum(state.VD0);
    val = w(1) * PL / max(basePL,1e-6) + ...
          w(2) * QL / max(baseQL,1e-6) + ...
          w(3) * VD / max(baseVD,1e-6) + state.penalty;
end
function state = apply_resources(D, cfg)
    if iscell(cfg)
        configs = [cfg{:}];
    else
        configs = cfg;
    end
    Ia = D.Ia;
    Ir = D.Ir;
    Nb1 = numel(D.R);
    T = size(Ia,1);
    for k = 1:numel(configs)
        bus = max(2,min(configs(k).bus, Nb1+1));
        mask = zeros(1,Nb1);
        mask(1:bus-1) = 1;
        a = tan(acos(max(min(configs(k).pf,1),-1)));
        scale = configs(k).size;
        mf = choose_modulation(D, configs(k));
        Ia = Ia - scale * mf .* repmat(mask,T,1);
        Ir = Ir - scale * a * mf .* repmat(mask,T,1);
    end
    PL0 = branch_losses(D.R, D.Ia, D.Ir);
    QL0 = branch_losses(D.X, D.Ia, D.Ir);
    VD0 = voltage_dev(D, D.Ia, D.Ir);
    PLn = branch_losses(D.R, Ia, Ir);
    QLn = branch_losses(D.X, Ia, Ir);
    VDn = voltage_dev(D, Ia, Ir);
    Vb  = compute_voltage_profile(D, Ia, Ir);
    penalty = 0;
    if isfield(D,'Smax') && ~isempty(D.Smax)
        Slim = reshape(D.Smax,1,[]);
        Suse = abs(Vb(:,1:end-1)).*sqrt(Ia.^2 + Ir.^2);
        excess = max(0, bsxfun(@minus, Suse, Slim));
        penalty = penalty + 1e3 * sum(excess(:).^2);
    end
    vMin = getfield_def(D,'Vmin',0.95);
    vMax = getfield_def(D,'Vmax',1.05);
    if ~isscalar(vMin)
        vMin = min(vMin(:));
    end
    if ~isscalar(vMax)
        vMax = max(vMax(:));
    end
    lowViol = max(0, vMin - min(Vb,[],2));
    highViol = max(0, max(Vb,[],2) - vMax);
    penalty = penalty + 1e3 * sum(lowViol.^2 + highViol.^2);
    state = struct('Ia',Ia,'Ir',Ir,'PL',PLn,'QL',QLn,'VD',VDn, ...
                   'PL0',PL0,'QL0',QL0,'VD0',VD0,'penalty',penalty, ...
                   'V',Vb);
end
function mf = choose_modulation(D, cfg)
    if isfield(cfg,'type')
        switch lower(string(cfg.type))
            case "wt"
                mf = getfield_def(D,'mfWT',D.mf);
            case "pv"
                mf = getfield_def(D,'mfPV',D.mf);
            otherwise
                mf = getfield_def(D,'mf',ones(size(D.Ia)));
        end
    else
        mf = getfield_def(D,'mf',ones(size(D.Ia)));
    end
end
function PL = branch_losses(weights, Ia, Ir)
    term = bsxfun(@times, Ia.^2 + Ir.^2, reshape(weights,1,[]));
    PL = sum(term, 2);
end
function VD = voltage_dev(D, Ia, Ir)
    drops = bsxfun(@times, Ia, reshape(D.R,1,[])) + bsxfun(@times, Ir, reshape(D.X,1,[]));
    VD = sum(drops.^2, 2);
end
function V = compute_voltage_profile(D, Ia, Ir)
    T = size(Ia,1);
    Nb = numel(D.R)+1;
    V = zeros(T,Nb);
    V(:,1) = D.V0;
    acc = zeros(T,1);
    for k = 1:Nb-1
        drop = D.R(k) * Ia(:,k) + D.X(k) * Ir(:,k);
        acc = acc + drop;
        V(:,k+1) = D.V0 - acc;
    end
end
function cases = compute_case_metrics(D, optim)
    base = apply_resources(D, struct('bus',2,'size',0,'pf',0.95));
    pvCfg = pv_case(optim.best.z);
    wtCfg = wt_case(optim.best.z);
    pv   = apply_resources(D, pvCfg);
    wt   = apply_resources(D, wtCfg);
    both = apply_resources(D, [pvCfg, wtCfg]);
    cases = struct();
    cases.base = summarise_case(D, base, 'Base');
    cases.caseI = summarise_case(D, pv, 'Case I (PV)');
    cases.caseII = summarise_case(D, wt, 'Case II (WT)');
    cases.caseIII = summarise_case(D, both, 'Case III (PV+WT)');
end
function cfg = pv_case(z)
    cfg = z; cfg.type = 'pv';
end
function cfg = wt_case(z)
    cfg = z;
    cfg.type = 'wt';
    cfg.bus = cfg.bus + 1;
end
function summary = summarise_case(D, state, label)
    summary = struct();
    summary.label = label;
    summary.PL = mean(state.PL);
    summary.QL = mean(state.QL);
    summary.Vmin = min(state.V,[],2);
    summary.Vavg = mean(state.V,2);
    summary.IMO = compose_imo(D, state);
    summary.busVoltages = state.V;
    summary.Ia = state.Ia;
    summary.Ir = state.Ir;
end
function IMO = compose_imo(D, state)
    w = getfield_def(D,'w',[0.6 0.2 0.2]);
    IMO = w(1)*state.PL./max(state.PL0,1e-6) + ...
          w(2)*state.QL./max(state.QL0,1e-6) + ...
          w(3)*state.VD./max(state.VD0,1e-6);
end
function tables = build_tables(D, predictions, optim, cases)
    tables = struct();
    if ~isempty(fieldnames(predictions))
        tables.prediction = predictions.metrics;
    end
    tables.optimisation = optimisation_table(optim, cases);
    tables.energy = energy_reduction_table(D, cases);
end
function tbl = optimisation_table(optim, cases)
    names = {'Case','Average IMO','Average PL','Average Vmin'};
    rows = {
        cases.base.label,  mean(cases.base.IMO),  mean(cases.base.PL),  mean(cases.base.Vmin);
        cases.caseI.label, mean(cases.caseI.IMO), mean(cases.caseI.PL), min(cases.caseI.Vmin);
        cases.caseII.label,mean(cases.caseII.IMO),mean(cases.caseII.PL),min(cases.caseII.Vmin);
        cases.caseIII.label,mean(cases.caseIII.IMO),mean(cases.caseIII.PL),min(cases.caseIII.Vmin);
    };
    tbl = struct('headers', {names}, 'rows', rows, 'method', optim.best.method);
end
function tbl = energy_reduction_table(~, cases)
    basePL = mean(cases.base.PL);
    tbl = struct();
    tbl.headers = {'Case','PL Reduction (%)','Vmin Gain (pu)'};
    tbl.rows = {
        cases.caseI.label,  reduction_pct(mean(cases.caseI.PL), basePL),  gain(min(cases.caseI.Vmin), min(cases.base.Vmin));
        cases.caseII.label, reduction_pct(mean(cases.caseII.PL), basePL), gain(min(cases.caseII.Vmin), min(cases.base.Vmin));
        cases.caseIII.label,reduction_pct(mean(cases.caseIII.PL), basePL),gain(min(cases.caseIII.Vmin), min(cases.base.Vmin));
    };
end
function pct = reduction_pct(val, base)
    pct = (1 - val / max(base,1e-6)) * 100;
end
function g = gain(val, base)
    g = val - base;
end
function audit = build_audit_payload(D, opts, predictions, optim, cases, tables)
    audit = struct();
    audit.dataset = struct('nb', getfield_def(D,'nb',numel(D.R)+1), ...
                           'nBranches', getfield_def(D,'nBranches',numel(D.R)));
    audit.options = opts;
    audit.weights = getfield_def(D,'w',[0.6 0.2 0.2]);
    audit.predictions = predictions;
    audit.optimisation = optim;
    audit.cases = cases;
    audit.tables = tables;
    if isfield(D,'pred_currents')
        audit.pred_currents = D.pred_currents;
    end
end
function plot_outputs(D, predictions, cases, optim)
    cols = {'r','g','b','m','k','y'};
    t = D.t_hours;
    if has_forecasts(D) && isfield(predictions,'PV') && isfield(predictions,'WT') && isfield(predictions,'LD')
        draw_prediction('PV', t, D.PV, predictions.PV, cols);
        draw_prediction('WT', t, D.WT, predictions.WT, cols);
        draw_prediction('Load', t, D.LD, predictions.LD, cols);
        draw_actual_stack('Actual PV/WT/Load', t, cols, {'PV','WT','Load'}, {D.PV,D.WT,D.LD});
        draw_dual_vs_blstm('Dual-TPE vs BLSTM', t, predictions, cols);
    end
    hist = optim.history;
    draw_history('Objective by Iteration', hist, cols, false);
    convHist = struct();
    histNames = fieldnames(hist);
    for i = 1:numel(histNames)
        convHist.(histNames{i}) = cumminSeries(hist.(histNames{i}));
    end
    draw_history('Convergence', convHist, cols, true);
    Nb1 = numel(D.R); buses = 1:Nb1;
    pv_sizes = zeros(1,Nb1); wt_sizes = zeros(1,Nb1);
    pv_bus = max(1, optim.best.z.bus-1);
    wt_bus = max(1, min(Nb1, pv_bus+1));
    pv_sizes(pv_bus) = optim.best.z.size; wt_sizes(wt_bus) = optim.best.z.size;
    dual_axis_bar('PV Size and PF', buses, pv_sizes, cols{1}, {mean(cases.caseI.IMO), optim.best.z.pf}, cols(3:4), {'IMO','PF'});
    dual_axis_bar('WT Size and PF', buses, wt_sizes, cols{3}, {mean(cases.caseII.IMO), optim.best.z.pf}, cols(5:6), {'IMO','PF'});
    [PLb, QLb, VDb] = per_bus_indices(D, optim.best.z);
    figure('Name','Bus Indices'); bar(buses, [PLb(:), QLb(:), VDb(:)]); grid on;
    legend({'Active','Reactive','Voltage'}); xlabel('Bus'); ylabel('Index (arb.)');
    figure('Name','PV & WT Output vs Time'); hold on; grid on;
    plot(t, optim.best.z.size * D.mfPV(:,1), cols{1}, 'DisplayName','PV Output');
    plot(t, optim.best.z.size * D.mfWT(:,1), cols{3}, 'DisplayName','WT Output'); legend show;
    xlabel('Time (hr)'); ylabel('Power (MW)');
    dual_axis_bar('PV & WT Case Summary', buses, pv_sizes + wt_sizes, cols{2}, {mean(cases.caseI.IMO), mean(cases.caseII.IMO), optim.best.z.pf}, cols(4:6), {'IMO PV','IMO WT','PF'});
    plot_case_series('IMO vs Time', t, cases, cols, @(c)c.IMO);
    plot_case_series('Power Loss vs Time', t, cases, cols, @(c)c.PL);
    plot_case_series('Minimum Voltage vs Time', t, cases, cols, @(c)c.Vmin);
    plot_case_series('Average Voltage vs Time', t, cases, cols, @(c)c.Vavg);
    if isfield(D,'ESS') && isstruct(D.ESS)
        draw_ess_plots(D, cols);
    end
end
function draw_prediction(tag, t, actual, pred, cols)
    names = {'LSTM','Dual','TPE','BLSTM'}; suffix = {' LSTM',' Dual LSTM',' Dual LSTM-TPE',' BLSTM'};
    figure('Name',sprintf('%s Predictions',tag)); hold on; grid on;
    plot(t, actual, cols{1}, 'LineWidth',1.3, 'DisplayName',sprintf('%s Actual',tag));
    for i = 1:numel(names)
        if isfield(pred, names{i})
            plot(t, pred.(names{i}), cols{min(i+1,numel(cols))}, 'DisplayName', [tag suffix{i}]);
        end
    end
    xlabel('Time (hr)'); ylabel(sprintf('%s (kW)', tag)); legend show;
end
function draw_actual_stack(name, t, cols, labels, series)
    figure('Name',name); hold on; grid on;
    for i = 1:numel(series)
        plot(t, series{i}, cols{min(i,numel(cols))}, 'DisplayName',sprintf('%s Actual',labels{i}));
    end
    xlabel('Time (hr)'); ylabel('Power (kW)'); legend show;
end
function draw_dual_vs_blstm(name, t, predictions, cols)
    figure('Name',name); hold on; grid on;
    fields = {'PV','WT','LD'};
    for i = 1:numel(fields)
        plot(t, predictions.(fields{i}).TPE, cols{i}, 'DisplayName',sprintf('%s TPE',fields{i}));
        plot(t, predictions.(fields{i}).BLSTM, cols{i+3}, 'DisplayName',sprintf('%s BLSTM',fields{i}));
    end
    xlabel('Time (hr)'); ylabel('Predicted (kW)'); legend show;
end
function draw_history(name, histStruct, cols, cumulative)
    figure('Name',name); hold on; grid on;
    names = fieldnames(histStruct);
    for i = 1:numel(names)
        data = histStruct.(names{i});
        plot(0:numel(data)-1, data(:), cols{mod(i-1,numel(cols))+1}, 'DisplayName',names{i});
    end
    xlabel('Iteration'); ylabel(ternary(cumulative,'Best-so-far J','Objective J')); legend show;
end
function dual_axis_bar(name, buses, barVals, barColor, lineVals, lineColors, legends)
    figure('Name',name); yyaxis left; bar(buses, barVals, 'FaceColor', barColor); ylabel('Size (MW)');
    yyaxis right; hold on; for i = 1:numel(lineVals); plot(buses, repmat(lineVals{i},1,numel(buses)), lineColors{i}, 'DisplayName',legends{i}); end
    xlabel('Bus'); legend show; grid on;
end
function draw_ess_plots(D, cols)
    t = D.t_hours; R = D.ESS;
    SOC = getfield_def(R,'SOC',nan(numel(t),1)); PMW = getfield_def(R,'P_MW',zeros(numel(t),1)); V = getfield_def(R,'V_kV',ones(numel(t),1)); I = PMW ./ max(V,1e-6); eta = getfield_def(R,'eta',ones(numel(t),1));
    figure('Name','ESS SOC & Discharge'); hold on; grid on; plot(t, SOC, cols{2}, 'DisplayName','SOC'); plot(t, max(PMW,0), cols{1}, 'DisplayName','Discharge P'); legend show; xlabel('Time (hr)');
    figure('Name','ESS Power & Energy'); hold on; grid on; plot(t, PMW, cols{3}, 'DisplayName','P_{ESS}'); plot(t, cumsum(PMW)*getfield_def(D,'dt',1.0), cols{4}, 'DisplayName','Energy'); legend show; xlabel('Time (hr)');
    figure('Name','ESS Voltage & Current'); hold on; grid on; plot(t, V, cols{5}, 'DisplayName','Voltage'); plot(t, I, cols{6}, 'DisplayName','Current'); legend show; xlabel('Time (hr)');
    figure('Name','ESS Efficiency'); hold on; grid on; plot(t, eta, cols{2}, 'DisplayName','Efficiency'); legend show; xlabel('Time (hr)');
    figure('Name','PV+WT+ESS vs Load'); hold on; grid on; plot(t, D.PV, cols{1}, 'DisplayName','PV'); plot(t, D.WT, cols{2}, 'DisplayName','WT'); plot(t, D.LD, cols{5}, 'DisplayName','Load'); plot(t, PMW, cols{3}, 'DisplayName','ESS Power'); legend show; xlabel('Time (hr)');
end
function data = cumminSeries(series)
    data = cummin(series(:));
end
function plot_case_series(name, t, cases, cols, extractor)
    figure('Name', name); hold on; grid on;
    plot(t, extractor(cases.base), cols{5}, 'DisplayName','Base');
    plot(t, extractor(cases.caseI), cols{1}, 'DisplayName','Case I');
    plot(t, extractor(cases.caseII), cols{2}, 'DisplayName','Case II');
    plot(t, extractor(cases.caseIII), cols{4}, 'DisplayName','Case III');
    xlabel('Time (hr)'); legend show;
end
function [PLb, QLb, VDb] = per_bus_indices(D, cfg)
    state = apply_resources(D, cfg);
    PLb = sum(bsxfun(@times, state.Ia.^2 + state.Ir.^2, reshape(D.R,1,[])), 1);
    QLb = sum(bsxfun(@times, state.Ia.^2 + state.Ir.^2, reshape(D.X,1,[])), 1);
    drops = bsxfun(@times, state.Ia, reshape(D.R,1,[])) + bsxfun(@times, state.Ir, reshape(D.X,1,[]));
    VDb = sum(drops.^2, 1);
end
function validate_jan930_inputs(D, opts)
    req = {'R','X','Ia','Ir','V0','PF'};
    for k = 1:numel(req)
        assert(isfield(D,req{k}) && ~isempty(D.(req{k})), 'Missing field D.%s', req{k});
    end
    assert(isnumeric(D.R) && isrow(D.R), 'R must be row vector.');
    assert(isnumeric(D.X) && isrow(D.X) && numel(D.R)==numel(D.X), 'X must match R.');
    assert(all(isfinite(D.R)) && all(D.R>=0), 'R must be nonnegative.');
    assert(all(isfinite(D.X)) && all(D.X>=0), 'X must be nonnegative.');
    assert(ismatrix(D.Ia) && isequal(size(D.Ia), size(D.Ir)), 'Ia/Ir size mismatch.');
    assert(all(isfinite(D.Ia),'all') && all(isfinite(D.Ir),'all'), 'Currents must be finite.');
    assert(isscalar(D.V0) && isfinite(D.V0), 'V0 must be scalar.');
    assert(isvector(D.PF) && numel(D.PF)==2, 'PF must be 1x2 vector.');
    assert(D.PF(1)>0 && D.PF(2)<=1 && D.PF(1)<=D.PF(2), 'Invalid PF bounds.');
    if isfield(D,'mf') && ~isempty(D.mf)
        assert(isequal(size(D.mf), size(D.Ia)), 'mf must match Ia size.');
    end
    if isfield(D,'mfPV') && ~isempty(D.mfPV)
        assert(isequal(size(D.mfPV), size(D.Ia)), 'mfPV must match Ia size.');
    end
    if isfield(D,'mfWT') && ~isempty(D.mfWT)
        assert(isequal(size(D.mfWT), size(D.Ia)), 'mfWT must match Ia size.');
    end
    if isfield(D,'dt'), assert(isfinite(D.dt) && D.dt>0, 'dt must be positive.'); end
    if isfield(opts,'methods'), assert(iscell(opts.methods) || isstring(opts.methods), 'methods must be list.'); end
end
function [smooth, last] = ewma_series(x, a)
    smooth = zeros(size(x));
    last = x(1);
    for i = 1:numel(x)
        last = a * last + (1-a) * x(i);
        smooth(i) = last;
    end
end
function s = scale_series(y)
    denom = max([max(y(:)), 0]) + 1e-6;
    s = y(:) / denom;
end
function z = normalize_series(y)
    y = y(:);
    z = (y - mean(y)) / max(std(y),1e-6);
end
function val = getfield_def(S, field, default)
    if isstruct(S) && isfield(S,field) && ~isempty(S.(field))
        val = S.(field);
    else
        val = default;
    end
end
function val = ternary(cond, a, b)
    if cond
        val = a;
    else
        val = b;
    end
end
