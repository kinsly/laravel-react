import{j as e,d as m}from"./app-Bg0_C09o.js";function p({id:r,className:i,src:a,tag:d,title:t,description:l,price:n,cart:s=null,handleAddtoCart:o}){return e.jsxs("div",{className:"border border-primary rounded position-relative vesitable-item",children:[e.jsx("div",{className:"vesitable-img",children:e.jsx("img",{src:a,className:`img-fluid w-100 rounded-top ${i}`,alt:""})}),e.jsx("div",{className:"text-white bg-primary px-3 py-1 rounded position-absolute",style:{top:10,right:10},children:d}),e.jsxs("div",{className:"p-4 rounded-bottom",children:[e.jsx("h4",{children:t}),e.jsx("p",{children:l}),e.jsxs("div",{className:"d-flex justify-content-between flex-lg-wrap",children:[e.jsxs("p",{className:"text-dark fs-5 fw-bold mb-0",children:["$",n," / kg"]}),(s==null?void 0:s.length)==0?e.jsxs("button",{onClick:()=>o(r),className:"btn border border-secondary rounded-pill px-3 text-primary",children:[e.jsx("i",{className:"fa fa-shopping-bag me-2 text-primary"})," Add to cart"]}):e.jsxs(m,{href:route("cart.index"),className:"btn border border-secondary rounded-pill px-3 text-primary",children:[e.jsx("i",{className:"fa fa-shopping-bag me-2 text-primary"})," View Cart"]})]})]})]})}export{p as O};
