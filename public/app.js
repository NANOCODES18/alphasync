// let showEl = document.querySelectorAll(".click")
// let information = document.querySelectorAll('.comeon')
// showEl.forEach(element => {
//     element.addEventListener('click',function(e){
//         information.forEach(info=>{
// if (e.target.id==info.id) {
//     info.classList.add('file')
//     console.log(e.target.id)
//     console.log(info)
// }
// else{
// info.classList.remove("file");
// info.style.width='100%';
// }
//         })
//     })
// });
// let firstId = document.getElementById("id1");
// let secondId = document.getElementById("id2");
// let thirdId = document.getElementById("id3");
// let first = document.getElementById('first')
// let second = document.getElementById('second')
// let third = document.getElementById('third')
// first.addEventListener("click", showInfo);
// second.addEventListener("click", show2Info);
// third.addEventListener("click", show3Info);
// console.log(firstId)
// function showInfo() {
//   firstId.style.display = "none";
//   secondId.style.display = "block";
//   thirdId.style.display = "block";
//   firstId.style.overflow = "hidden";
//   secondId.style.overflow = "visible";
//   thirdId.style.overflow = "visible";

// }
// function show2Info() {
//     console.log(secondId)
//   firstId.style.display = "none";
//   secondId.style.display = "block";
//   thirdId.style.display = "none";
// }
// function show3Info() {
//   firstId.style.display = "none";
//   secondId.style.display = "none";
//   thirdId.style.display = "block";
// }

let first = document.getElementById("first");
let second = document.getElementById("second");
let third = document.getElementById("third");
let id1 = document.getElementById("id1");
let id2 = document.getElementById("id2");
let id3 = document.getElementById("id3");
first.addEventListener("click", show1info);
second.addEventListener("click", show2info);
third.addEventListener("click", show3info);
function show1info() {
    id1.style.overflow = 'visible'
    id2.style.overflow = 'hidden'
    id3.style.overflow = 'hidden'
  console.log("romeo");
}
function show2info() {
    id1.style.overflow = 'hidden'
    id2.style.overflow = 'visible'
    id3.style.overflow = 'hidden'
  console.log("mine");
}
function show3info() {
    id1.style.overflow = 'hidden'
    id2.style.overflow = 'hidden'
    id3.style.overflow = 'visible'
  console.log("faith");
}
