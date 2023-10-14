// for banner add

let banner = document.querySelector(".banner");
let banner_img = document.querySelector(".banner_img");
// console.log(banner_img);

banner.addEventListener("change",(event)=>{
    

 let url  =URL.createObjectURL(event.target.files[0]);
  

    banner_img.src = url;
})

// for addabout
