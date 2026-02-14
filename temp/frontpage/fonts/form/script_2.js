var InvestNames = ["victor","james","robert","mary","patricia","jennifer","Michael","Linda","William","Elizabeth",
"David","Barbara","Richard","susan","Joseph","Jessica","Thomas","Sarah","Charles","Karen","Christopher","Nancy","Daniel",
"Lisa","Matthew","Betty","Anthony","Margaret","Mark","Sandra","Donald","Ashley","Steven","Kimberly","Paul","Emily",
"Andrew","Donna","Joshua","Michelle","Kenneth","Dorothy","Kevin","Carol","Brian","Amanda","George","Melissa","Edward",
"Deborah","Ronald","Stephanie","Timothy","Rebecca","Jason","Sharon","Jeffrey","Laura","Ryan","Cynthia","Jacob","Kathleen",
"Gary","Amy","Nicholas","Shirley","Eric","Angela","Jonathan","Helen","Stephen","Anna","Larry","Brenda","Justin","Pamela",
"Scott","Nicole","Brandon","Emma","Benjamin","Samantha","Samuel","Katherine","Gregory","Christine","Frank","Debra",
"Alexander","Rachel","Raymond","Catherine","Patrick","Carolyn","Jack","Janet","Dennis","Ruth","Jerry","Maria","Tyler",
"Heather","Aaron","Diane","Jose","Virginia","Adam","Julie","Henry","Joyce","Nathan","Victoria","Douglas","Olivia",
"Zachary","Kelly","Peter","Christina","Kyle","Lauren","Walter","Joan","Ethan","Evelyn","Jeremy","Judith","Harold",
"Megan","Keith","Cheryl","Christian","Andrea","Roger","Hannah","Noah","Martha","Gerald","Jacqueline","Carl","Frances",
"Terry","Gloria","Sean","Ann","Austin","Teresa","Arthur","Kathryn","Lawrence","Sara","Jesse","Janice","Dylan","Jean",
"Bryan","Alice","Joe","Madison","Jordan","Doris","Billy","Abigail","Bruce","Julia","Albert","Judy","Willie","Grace",
"Gabriel","Denise","Logan","Amber","Alan","Marilyn","Juan","Beverly","Wayne","Danielle","Roy","Theresa","Ralph","Sophia",
"Randy","Marie","Eugene","Diana","Vincent","Brittany","Russell","Natalie","Elijah","Isabella","Louis","Charlotte","Bobby",
"Rose","Philip","Alexis","Johnny","Kayla"]
investAmounts =["1230", "20", "599","1250","4533","1200","80","134","654","2345","654","990","786","543","380","999","1000","354","545","764","987","2341","4566",
"765","876","1400","342","765","2345","1233","5432","765","2345","400","999","333","234","766","653","30","40","50"]
investCoins = ["Bitcoin", "Bitcoin","Litecoin","Bitcoin","Ethereum","Dogecoin","Bitcoin","Bitcoin", "Bitcoin","Bitcoin", "Bitcoin","Bitcoin","Bitcoin", "Bitcoin","Bitcoin","Bitcoin","Bitcoin", "Bitcoin","Bitcoin","Bitcoin","Bitcoin", "Bitcoin","Bitcoin"]

function generator() {
      document.getElementById("InvestName").innerHTML = InvestNames[Math.floor(Math.random() * InvestNames.length)];
      document.getElementById("InvestName1").innerHTML = InvestNames[Math.floor(Math.random() * InvestNames.length)];
      document.getElementById("InvestName2").innerHTML = InvestNames[Math.floor(Math.random() * InvestNames.length)];
      document.getElementById("InvestName3").innerHTML = InvestNames[Math.floor(Math.random() * InvestNames.length)];
      document.getElementById("InvestName4").innerHTML = InvestNames[Math.floor(Math.random() * InvestNames.length)];

      document.getElementById("investAmount").innerHTML = " &dollar;" + " " + investAmounts[Math.floor(Math.random() * investAmounts.length)];
      document.getElementById("investAmount1").innerHTML = " &dollar;" + " " + investAmounts[Math.floor(Math.random() * investAmounts.length)];
      document.getElementById("investAmount2").innerHTML = " &dollar;" + " " + investAmounts[Math.floor(Math.random() * investAmounts.length)];
      document.getElementById("investAmount3").innerHTML = " &dollar;" + " " + investAmounts[Math.floor(Math.random() * investAmounts.length)];
      document.getElementById("investAmount4").innerHTML = " &dollar;" + " " + investAmounts[Math.floor(Math.random() * investAmounts.length)];

      document.getElementById("investCoin").innerHTML = investCoins[Math.floor(Math.random() * investCoins.length)];
      document.getElementById("investCoin1").innerHTML = investCoins[Math.floor(Math.random() * investCoins.length)];
      document.getElementById("investCoin2").innerHTML = investCoins[Math.floor(Math.random() * investCoins.length)];
      document.getElementById("investCoin3").innerHTML = investCoins[Math.floor(Math.random() * investCoins.length)];
      document.getElementById("investCoin4").innerHTML = investCoins[Math.floor(Math.random() * investCoins.length)];



      document.getElementById("depositName").innerHTML = InvestNames[Math.floor(Math.random() * InvestNames.length)];
      document.getElementById("depositName1").innerHTML = InvestNames[Math.floor(Math.random() * InvestNames.length)];
      document.getElementById("depositName2").innerHTML = InvestNames[Math.floor(Math.random() * InvestNames.length)];
      document.getElementById("depositName3").innerHTML = InvestNames[Math.floor(Math.random() * InvestNames.length)];
      document.getElementById("depositName4").innerHTML = InvestNames[Math.floor(Math.random() * InvestNames.length)];

      document.getElementById("depositAmount").innerHTML = " &dollar;" + " " + investAmounts[Math.floor(Math.random() * investAmounts.length)];
      document.getElementById("depositAmount1").innerHTML = " &dollar;" + " " + investAmounts[Math.floor(Math.random() * investAmounts.length)];
      document.getElementById("depositAmount2").innerHTML = " &dollar;" + " " + investAmounts[Math.floor(Math.random() * investAmounts.length)];
      document.getElementById("depositAmount3").innerHTML = " &dollar;" + " " + investAmounts[Math.floor(Math.random() * investAmounts.length)];
      document.getElementById("depositAmount4").innerHTML = " &dollar;" + " " + investAmounts[Math.floor(Math.random() * investAmounts.length)];

      document.getElementById("depositcoin").innerHTML = investCoins[Math.floor(Math.random() * investCoins.length)];
      document.getElementById("depositcoin1").innerHTML = investCoins[Math.floor(Math.random() * investCoins.length)];
      document.getElementById("depositcoin2").innerHTML = investCoins[Math.floor(Math.random() * investCoins.length)];
      document.getElementById("depositcoin3").innerHTML = investCoins[Math.floor(Math.random() * investCoins.length)];
      document.getElementById("depositcoin4").innerHTML = investCoins[Math.floor(Math.random() * investCoins.length)];
      setTimeout(generator, 2000);

    
}