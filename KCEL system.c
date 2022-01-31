#include<stdio.h>
#include<conio.h>
#include<time.h>
#include<string.h>
int grade(int A[26][28], int B[], int c){
    int total=0;
    for(int index=0; index<28; index++){

        if(A[c][index]==B[index]){
        total+=1;
        }

}
return total;
}
int reference(char c){

    char letters[]="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    for(int i=0; i<26; i++){
        if(c==letters[i])
            return i;

    }
}
int main()
{
    int pattern[26][28]={{0,1,1,0,1,0,0,1,1,0,0,1,1,1,1,1,1,0,0,1,1,0,0,1,1,0,0,1},
    {1,1,1,0,1,0,0,1,1,0,0,1,1,1,1,0,1,0,0,1,1,0,0,1,1,1,1,0},
    {0,0,1,1,0,1,0,0,1,0,0,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,1,1},
    {1,1,0,0,1,0,1,0,1,0,0,1,1,0,0,1,1,0,0,1,1,0,1,0,1,1,0,0},
    {1,1,1,1,1,0,0,0,1,0,0,0,1,1,1,1,1,0,0,0,1,0,0,0,1,1,1,1},
    {1,1,1,1,1,0,0,0,1,0,0,0,1,1,1,1,1,0,0,0,1,0,0,0,1,0,0,0},
    {0,1,1,0,1,0,0,1,1,0,0,0,1,0,0,0,1,0,1,1,1,0,0,1,0,1,1,0},
    {1,0,0,1,1,0,0,1,1,0,0,1,1,1,1,1,1,0,0,1,1,0,0,1,1,0,0,1},
    {1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0},
    {0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,1,0,0,1,1,0,0,1,0,1,1,0},
    {1,0,0,1,1,0,1,0,1,1,0,0,1,0,0,0,1,1,0,0,1,0,1,0,1,0,0,1},
    {1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,1,1,1},
    {1,0,0,1,1,1,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1},
    {1,0,0,1,1,1,0,1,1,0,1,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1},
    {0,1,1,0,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,0,1,1,0},
    {1,1,1,0,1,0,0,1,1,0,0,1,1,1,1,0,1,0,0,0,1,0,0,0,1,0,0,0},
    {0,1,1,0,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,0,1,1,0,0,0,0,1},
    {1,1,1,0,1,0,0,1,1,0,0,1,1,1,1,0,1,1,0,0,1,0,1,0,1,0,0,1},
    {0,1,1,0,1,0,0,1,1,0,0,0,0,1,1,0,0,0,0,1,1,0,0,1,0,1,1,0},
    {1,1,1,1,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0},
    {1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,0,1,1,0},
    {1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,0,1,0,0},
    {1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,1,0,1,1,0,0,1},
    {1,0,0,1,1,0,0,1,1,0,0,1,0,1,1,0,1,0,0,1,1,0,0,1,1,0,0,1},
    {1,0,0,1,1,0,0,1,1,0,0,1,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0},
    {1,1,1,1,0,0,0,1,0,0,1,0,0,1,0,0,1,0,0,0,1,0,0,0,1,1,1,1}};

/*int p=0;

for (int x = 0; x < 26; x++){
    for(int row=0; row<7; row++){
        for(int col=0; col<4; col++){
            if(m[x][p]==1)
                printf("*");
            else
                printf(" ");
            p++;
        }
        printf("\n");
    }
    printf("\n\n");
    p=0;
}*/
    time_t start,stop;
    float tot=0;
    int u;
    int v;
    int score=0;
    float percentage;

    int Answer[28];
    char assignment[]="BX";
    for(int d=0;d<strlen(assignment);d++){
            printf("Draw pattern for letter %c\n\n",assignment[d]);
            int k=0;
    start= time(NULL);
    kcel:

    for(int row=0; row<7; row++){
        for(int col=0; col<4; col++){
            printf("enter 1 or 0 at position %d%d:\n",row, col );
            scanf("%d", &Answer[k]);
            if(Answer[k]!=1 && Answer[k]!=0){
                printf("wrong input,repeat\n");
                k=0;
                goto kcel;
            }
            k++;
        }
    }
    printf("\n");
    int p=0;
    for(int row=0; row<7; row++){
        for(int col=0; col<4; col++){
            if(Answer[p]==1){
                printf("*");
                p++;
            }
            else if(Answer[p]==0){
                printf(" ");
                p++;
            }
        }
        printf("\n");}
    stop=time(NULL);
     printf("Time taken is %.4f seconds\n", difftime(stop,start));
     tot+= difftime(stop,start);
    int charI= reference(assignment[d]);
    int f=grade(pattern,Answer,charI);
    score+=grade(pattern,Answer,charI);


    printf("Your marks for letter %c is %d", assignment[d], f);
    //u+= percentage;
    printf("\n\n");

    }
    v= strlen(assignment)*28;
    percentage=(float) score/v * 100;


    printf("Total Time taken is %.4f seconds\n", tot);
    printf("score is %d\n",score);
    printf("Your Total Percentage is %.2f",percentage );



   return 0;
}
