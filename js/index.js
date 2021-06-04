let section3 = document.getElementById("section3");


let header = window.document.getElementsByTagName('header')[0];
console.log(header)

function changeHeaderBG(){
    let logo = header.querySelector('#logo')
    let aList = header.querySelectorAll('a');
    let bars = header.querySelector('.bars');
    let painterImg = document.getElementById('painter-img');
    if(window.scrollY > 70)
    {
        header.classList.add("scrolled");
        logo.setAttribute('src','assets/images/CANVAS-black.svg')
        bars.classList.add('bars-scrolled');
        for(let i =0; i<aList.length;i++)
        {
     
            aList[i].classList.add("menu-items-scrolled");
        }

       
    }
    else{
        header.classList.remove("scrolled");
        logo.setAttribute('src','assets/images/CANVAS.svg')
        bars.classList.remove('bars-scrolled');

        for(let i =0; i<aList.length;i++)
        {

            aList[i].classList.remove("menu-items-scrolled");
            

        }
    }

    if (window.scrollY >= painterImg.getBoundingClientRect().top) {
        painterImg.classList.add('painter-img-scale');
      }
   
}
window.addEventListener("scroll",changeHeaderBG);

// json object
// let painter = {
//     name:"Fadi Ramzi Mohammed",
//     artType: "XYZ",
//     image:"painter2.png",
//     details:{
//         age:25,
//         experience:"5 years",
//         rating:4.5
//     }
// }

// let list = [
//     6,
//     5,
//     7,
//     4,
//     8,
//     7,
//     2,
//     1,
//     8
// ];


// let sum = 0;
// let avg = 0;

function displayImage()
{
    let img = document.getElementById("face-img-id");
    img.classList.add('scale-img');
}


// Week 5 - Day1
// Arrays & strings in details

// var fruits = ["Banana", "Orange", "Apple", "Mango"];
// console.log(fruits)

// let str = fruits.toString();
// console.log(str);

// let str3 =  fruits.pop();
// console.log(str)
// console.log(fruits.length)


// fruits.splice(2,0,"F1","F2","F3")
// console.log(fruits,fruits.length)

// Strings
// ["f","a","d","e"]
// let fullName = "Fadi#Ramzi";



let ibars = document.getElementById("ibars");
ibars.addEventListener("click",openMenu);

let menuDiv = document.getElementById('div-ul');
let ul = document.getElementById('menu-ul');
function openMenu()
{
    if(ibars.classList.contains("fa-bars"))
    {
        ibars.classList.replace("fas","fa");
        ibars.classList.replace("fa-bars","fa-times");

        menuDiv.classList.add("for-small-devices");
        ul.classList.add("ul-for-small-devices");
    }
    else if(ibars.classList.contains("fa-times"))
    {
        ibars.classList.replace("fa","fas");
        ibars.classList.replace("fa-times","fa-bars");
        menuDiv.classList.remove("for-small-devices");
        ul.classList.remove("ul-for-small-devices");
    }
    else{

    }
    
}


