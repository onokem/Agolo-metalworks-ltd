addpath(fileparts(mfilename('fullpath')));
T = 24;
t = (0:T-1)';
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
opts = {'methods',{'PSO','HYB'},'includePSO',true,'nP',8,'it',12,'seed',321,'plots',false,'tables',true};
out = Jan930(D, opts{:});
if isfield(out,'audit') && isfield(out.audit,'dataset')
    fprintf('Dataset buses  : %d (branches: %d)\n', out.audit.dataset.nb, out.audit.dataset.nBranches);
end
fprintf('Best objective J: %.4f\n', out.best.J);
fprintf('Chosen method   : %s\n', out.best.method);
fprintf('Best bus/size/pf: [%d, %.3f, %.3f]\n', out.best.z.bus, out.best.z.size, out.best.z.pf);
if isfield(out.tables,'prediction') && ~isempty(out.tables.prediction)
    disp(cell2table(out.tables.prediction.rows, 'VariableNames', out.tables.prediction.headers));
end
