function tests = test_Jan930
    tests = functiontests(localfunctions);
end
function setupOnce(tc)
    addpath(fileparts(mfilename('fullpath')));
    T = 24; t = (0:T-1)';
    PV = 0.75 + 0.25*sin(2*pi*t/T);
    WT = 0.55 + 0.35*cos(2*pi*t/T);
    LD = 1.10 + 0.30*sin(2*pi*t/T + pi/6);
    R = [0.082 0.094 0.031 0.011];
    X = [0.045 0.051 0.022 0.017];
    Ia = 0.6*ones(T,numel(R));
    Ir = zeros(T,numel(R));
    D = struct('R',R,'X',X,'Ia',Ia,'Ir',Ir,'mf',ones(T,numel(R)), ...
               'V0',1.0,'PF',[0.95 1.0],'Im_max',1.5,'dt',1.0, ...
               'Sbase_MVA',100,'Vll_kV',12.66, ...
               'PV',PV,'WT',WT,'LD',LD);
    tc.TestData.D = D;
    tc.TestData.T = T;
end
function teardownOnce(~)
    rmpath(fileparts(mfilename('fullpath')));
end
function testWorkflowOutputs(tc)
    D = tc.TestData.D;
    opts = {'methods',{'PSO','BPSO','HYB'},'includePSO',true,'nP',6,'it',10,'seed',123,'tables',true,'plots',false};
    out = Jan930(D, opts{:});
    verifyTrue(tc, isstruct(out.best));
    verifyTrue(tc, isfinite(out.best.J));
    verifyTrue(tc, isfield(out.best,'method'));
    verifyEqual(tc, numel(out.order), numel(fieldnames(out.methods)));
    verifyTrue(tc, isfield(out.methods,'PSO'));
    verifyTrue(tc, isfield(out.methods,'BPSO'));
    verifyTrue(tc, isfield(out.methods,'HYB'));
    verifyGreaterThan(tc, numel(out.methods.PSO.history), 0);
    verifyTrue(tc, isfield(out,'tables'));
    verifyTrue(tc, isfield(out.tables,'prediction'));
    verifyTrue(tc, isfield(out.tables,'optimisation'));
    verifyTrue(tc, isstruct(out.audit));
    verifyTrue(tc, isfield(out.audit,'dataset'));
    verifyEqual(tc, out.audit.dataset.nBranches, numel(D.R));
    verifyEqual(tc, out.audit.dataset.nb, numel(D.R)+1);
    verifyEqual(tc, out.audit.optimisation.best.method, out.best.method);
    verifyTrue(tc, isfield(out.audit,'pred_currents'));
    cur = out.audit.pred_currents;
    verifyTrue(tc, isfield(cur,'active'));
    verifySize(tc, cur.active, [tc.TestData.T, numel(D.R)]);
end
function testTablesShape(tc)
    D = tc.TestData.D;
    opts = {'methods',{'PSO'},'includePSO',true,'nP',5,'it',6,'seed',321,'tables',true,'plots',false};
    out = Jan930(D, opts{:});
    pred = out.tables.prediction;
    verifyEqual(tc, pred.headers, {'Series','Model','MAPE','MAE','RMSE'});
    verifyEqual(tc, size(pred.rows,2), numel(pred.headers));
    opt = out.tables.optimisation;
    verifyEqual(tc, opt.headers, {'Case','Average IMO','Average PL','Average Vmin'});
    energy = out.tables.energy;
    verifyEqual(tc, energy.headers, {'Case','PL Reduction (%)','Vmin Gain (pu)'});
end
