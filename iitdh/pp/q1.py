import sys
# f=open(sys.argv[1])
# w,c,r=0,0,0


file=open(sys.argv[1],'r')
m=[]

for line in file:
	m += list(map(int,line.rstrip().split()))



data=[]
data=m



a=[]

def q1(data):

	data.sort()
	i=0
	a.append(data[0])
	while i<len(data):
		if(i!=(len(data)-1)):
			if data[i+1]!=data[i]:
				a.append(data[i+1])
		i += 1
	# print(a)
	if len(a)>=3:
		thirdsmallest=a[2]
	else:
		thirdsmallest = "Error"

	return thirdsmallest




#print(q1(data))