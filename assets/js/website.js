document.querySelectorAll(".split").forEach((elem) => {
  let splitText = elem.innerText;
  let splitWrap = splitText.split("").join("</span><span aria-hidden='true'>");
  splitWrap = "<span aria-hidden='true'>" + splitWrap + "</span>";
  elem.innerHTML = splitWrap;
  elem.setAttribute("aria-label", splitText);
});

window.onload = function () {
  //main
  function start(callback) {
    setTimeout(() => {
      document.querySelector(".loader").classList.remove("loader--active");
      console.log("1차 호출");
      callback();
    }, 500);
  }

  function second() {
    setTimeout(() => {
      //   document.getElementById("main").classList.add("page-main");
      document.getElementById("root").classList.remove("lock");
      console.log("2차 호출");
      mainTitle();
      sec2Cont();
    }, 1000);
  }

  start(function () {
    second();
  });

  //page__click classList add(html파일 loader)
  document.querySelectorAll(".page__click").forEach((elem) => {
    elem.addEventListener("click", (e) => {
      e.preventDefault();

      const href = elem.innerText.toLowerCase();

      document.querySelector(".loader").classList.add("loader--active");
      setTimeout(() => {
        window.location.href =
          "http://minji2260.dothome.co.kr/react_port3_php/pages/" +
          href +
          ".html";
      }, 2400);
    });
  });
  //page__click2 classList add(signin,login php파일 loader)
  document.querySelectorAll(".page__click2").forEach((elem) => {
    elem.addEventListener("click", (e) => {
      e.preventDefault();

      const href2 = elem.innerText;

      document.querySelector(".loader").classList.add("loader--active");
      setTimeout(() => {
        window.location.href =
          "http://minji2260.dothome.co.kr/react_port3_php/sign/" +
          href2 +
          ".php";
      }, 2400);
    });
  });
  //page__click3 classList add(board php파일 loader)
  document.querySelectorAll(".page__click3").forEach((elem) => {
    elem.addEventListener("click", (e) => {
      e.preventDefault();

      const href3 = elem.innerText;

      document.querySelector(".loader").classList.add("loader--active");
      setTimeout(() => {
        window.location.href =
          "http://minji2260.dothome.co.kr/react_port3_php/board/" +
          href3 +
          ".php";
      }, 2400);
    });
  });

  //------sec1 animation
  gsap.set(".sec1 .title h2 span", {
    opacity: 0,
    y: 150,
    display: "inline-block",
    "min-width": 20,
    rotation: "-20deg",
  });
  gsap.set(".sec1 .title p", { opacity: 0, x: 50, display: "inline-block" });
  // gsap.set(".sec2 .left .dot", { top: "-550vh" });
  function mainTitle() {
    let tl = gsap.timeline();
    tl.to("#header", { duration: 0.4, top: 0 });
    tl.to(
      ".sec1 .title h2 span",
      { duration: 0.4, opacity: 1, y: 0, stagger: 0.02, rotation: 0 },
      "+=0.2"
    );
    tl.to(".sec1 .title p", {
      duration: 0.4,
      opacity: 1,
      x: 0,
      ease: "power4.out",
    });
  }
  //------sec2 animation
  gsap.registerPlugin(ScrollTrigger);

  function sec2Cont() {
    // let tl = gsap.timeline();
    // tl.to(".sec2 .left .dot", {
    //   top: "0vh",
    // });
    // ScrollTrigger.create({
    //   trigger: ".sec2 .left .dot",
    //   // pin: "100px",
    //   start: "top 50%",
    //   end: "top 0%",
    //   duration: 10,
    //   markers: true,
    //   animation: tl,
    //   scrub: 3,
    // });
    const DOT = gsap.utils.toArray(".sec2 .left .dot");
    DOT.forEach((dot, i) => {
      ScrollTrigger.create({
        trigger: dot,
        toggleClass: "active",
        start: "top 95%",
        end: "top 30%",
        markers: true,
        // scrub: true,
        toggleActions: "play none none none",
        once: true,
      });
    });
    const subTxt = gsap.utils.toArray(".sec2 .left ul");
    subTxt.forEach((sub, i) => {
      ScrollTrigger.create({
        trigger: sub,
        toggleClass: "active",
        start: "top 95%",
        end: "top 30%",
        //  markers:true,
        //  scrub:true,
        toggleActions: "play none none none",
        once: true,
      });
    });
    const descContain = gsap.utils.toArray(
      ".sec2 .right .boxes .box .desc .desc_container"
    );
    descContain.forEach((contain, i) => {
      ScrollTrigger.create({
        trigger: contain,
        toggleClass: "active",
        start: "top 95%",
        end: "top 30%",
        //  markers:true,
        scrub: true,
        //  toggleActions:"play none none none",
        //  once:true
      });
    });

    const liTxt = gsap.utils.toArray(
      ".sec2 .right .boxes .box .desc .desc_tit"
    );
    liTxt.forEach((litxt, i) => {
      ScrollTrigger.create({
        trigger: litxt,
        toggleClass: "active",
        start: "top 95%",
        end: "top 30%",
        //  markers:true,
        //  scrub:true,
        toggleActions: "play none none none",
        once: true,
      });
    });
    const liTxtP = gsap.utils.toArray(
      ".sec2 .right .boxes .box .desc .desc_container p"
    );
    liTxtP.forEach((litxtP, i) => {
      ScrollTrigger.create({
        trigger: litxtP,
        toggleClass: "active",
        start: "top 95%",
        end: "top 30%",
        //  markers:true,
        //  scrub:true,
        toggleActions: "play none none none",
        once: true,
      });
    });
    const liTxtBtn = gsap.utils.toArray(
      ".sec2 .right .boxes .box .desc .desc_container .view"
    );
    liTxtBtn.forEach((liBtn, i) => {
      ScrollTrigger.create({
        trigger: liBtn,
        toggleClass: "active",
        start: "top 95%",
        end: "top 30%",
        //  markers:true,
        //  scrub:true,
        toggleActions: "play none none none",
        once: true,
      });
    });
    const deskTopImg = gsap.utils.toArray(".sec2 .right .boxes .box .pic img");
    deskTopImg.forEach((deskTop, i) => {
      ScrollTrigger.create({
        trigger: deskTop,
        toggleClass: "active",
        start: "top 100%",
        end: "top 40%",
        //  markers:true,
        scrub: true,
        //  toggleActions:"play none none none",
        //  once:true
      });
    });
  }
}; //window.onload
