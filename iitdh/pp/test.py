import sys
import q1 as v

file=open(sys.argv[1],'r')

m=[]

for line in file:
	m += list(map(int,line.rstrip().split()))




p=v.q1(m)

print(p)
