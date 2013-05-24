import sys
import numpy as np
import matplotlib
import pylab as pl

filename_nonce = sys.argv[1]
filename_without_nonce = sys.argv[2]

#Read the file
N = np.mat(np.loadtxt(filename_nonce, delimiter=','))
NON = np.mat(np.loadtxt(filename_without_nonce, delimiter=','))

features = ['Transactions','Elapsed Time(s)', 'Data Transferred(MB)','Response time(s)','Transaction Rate(transactions/s)']

featture_indices = [0, 1, 2, 3, 4, 5]

X = np.arange(10, 256, 10)
print len(X)
print len(N[:,0])
for i in range(0, len(features)):
    Y = N[:, i]
    YN = NON[:,i]
    title_str = "Plot of %(s)s versus concurrent users" % {'s':features[i]}
    pl.figure(i)
    pl.title(title_str)
    pl.plot(X, Y, color = 'r', linewidth=4, label='With nonce')
    pl.plot(X, YN, color = 'g', linewidth=4, label='Without nonce')
    pl.xlabel('Number of concurrent users')
    pl.ylabel(features[i])
    pl.legend()

pl.show()

