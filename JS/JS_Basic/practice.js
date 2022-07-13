// 1
// var markWeight = 70;
// var markHeight = 1.80;

// var johnWeight = 60;
// var johnHeight = 1.70;

//  var bmiMark = markWeight / (markHeight* markHeight);
//  console.log(bmiMark);

//  var bmiJohn = johnWeight / (johnHeight* johnHeight);
//  console.log(bmiJohn);

//  var markBmi = bmiMark > bmiJohn;
//  console.log(markBmi);

//  console.log("Is Mark's BMI higher than johm's?" + markBmi);     

 // 2
 var johnGame1 = 89;
 var johnGame2 = 120;
 var johnGame3 = 103;

 var mikeGame1 = 116 + 3;
 var mikeGame2 = 94;
 var mikeGame3 = 123;

 var maryGame1 =  97;
 var maryGame2 =  134;
 var maryGame3 =  105;


 var teamJohnAverage = (johnGame1+johnGame2+johnGame3)/3;
 console.log(teamJohnAverage);

 var teamMikeAverage = (mikeGame1+mikeGame2+mikeGame3)/3;
 console.log(teamMikeAverage);

 console.log("Winner is Team Mike.Whose Average score is " + teamMikeAverage);
 
 var teamMaryAverage = (maryGame1+maryGame2+maryGame3)/3;
 console.log(teamMaryAverage);
 
 // 3 

//  if(teamMikeAverage > teamJohnAverage){
//      console.log("Winner is Team Mike.Whose Average score is " + teamMikeAverage);
//     } 
//     else if( teamMikeAverage == teamJohnAverage) {
//         console.log("Draw");
//     } 
//     else {
//      console.log("Winner is Team John.Whose Average score is " + teamJohnAverage);
//  }

// 4

 if(teamMaryAverage > teamMikeAverage && teamMaryAverage > teamJohnAverage){
     console.log("Winner is Mary");
 } 
 else if(teamMikeAverage > teamJohnAverage && teamMikeAverage > teamMaryAverage){
     console.log("Winner is Mike");
 }
 else if(teamJohnAverage > teamMikeAverage && teamJohnAverage > teamMaryAverage){
     console.log("Winner is John");
 }
 else if(teamMaryAverage == teamJohnAverage || teamMaryAverage == teamMikeAverage)
 {
     console.log("Draw");
 }
 else {
     console.log("");
 }

 








