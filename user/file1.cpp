//   1 1 2 3  4  A
// 2 3 4 5 5  B
#include<iostream>
using namespace std;
#include<bits/stdc++.h>
#include<map>
#include<algorithm>
#include<cstring>
#include<vector>
#define ll long long
int main()
{
    ll t=1;
//    cin>>t;
    while(t--){
        map<ll , ll>total,half,ma,mb;
        ll n,temparra[n]={},temparrb[n]={},j;
        ll cost =0;
//        cin>>n;
n = 5;
        int flag =1;
        ll A[n]={1,1,2,3,4},B[n]={2,3,4,5,5};
        for(ll i=0;i<n;i++){
//            cin>>A[i];
            total[A[i]]++;
            ma[A[i]]++;
        }
        for(ll i=0;i<n;i++){
//            cin>>B[i];
            total[B[i]]++;
            mb[B[i]]++;
        }
        for( auto i:total){
            if(i.second %2!=0){
                flag =0;
                break;
            }
        }
        if(flag == 0){
            cout<<-1<<endl;
        }
        else{
            sort(A,A+n);
            sort(B,B+n);
            for( auto i:total){
                half[i.first] = i.second/2;
            }
            j=0;
            for(auto i :ma){
                // cout<<i.first<<"->"<<i.second<<endl;...
                // z = i.first
                if(half[i.first] != i.second)
                {
                    temparra[j] = i.first;
                    j++;
                }
            }
            j=0;
            for(auto i :mb){
                // cout<<i.first<<"->"<<i.second<<endl;...
                if(half[i.first] != i.second)
                {
                    temparrb[j] = i.first;
                    j++;
                }
            }
            ll s = sizeof(temparra)/sizeof(temparra[0]); 
            sort(temparra,temparra+s);
             s = sizeof(temparrb)/sizeof(temparrb[0]); 
            sort(temparrb,temparrb+s,greater<ll>());
            
            for(ll i=0;i<s;i++){
                cost +=min(temparra[i],temparrb[i]);
            }
            cout<<cost<<endl;
        }
    }
   
    return 0;
}
// we are given 2 arrays
// we have to perform swaps st bith become same(if possible)