import{W as c,r as t,j as e}from"./app-vNBdrkJc.js";import{S as d}from"./SinglePageHeader-D5U_hmEV.js";import{G as p}from"./GuestLayout-BtzcZuSC.js";function h(){const{data:r,setData:o,post:l,processing:i,errors:a,reset:m}=c({name:"",email:"",password:"",password_confirmation:""});t.useEffect(()=>()=>{m("password","password_confirmation")},[]);const n=s=>{s.preventDefault(),l(route("buyer.storeRegister"))};return e.jsxs(p,{children:[e.jsx(d,{title:"Register Now"}),e.jsx("div",{className:"container-fluid py-5",children:e.jsx("div",{className:"container col-md-6",children:e.jsx("div",{className:"justify-content-center",children:e.jsx("div",{className:"card",children:e.jsx("div",{className:"card-body",children:e.jsxs("form",{onSubmit:n,children:[e.jsxs("div",{className:"form-group row form-item w-100 py-2",children:[e.jsx("label",{htmlFor:"name",className:"col-sm-4 col-form-label",children:"Name"}),e.jsxs("div",{className:"col-sm-8",children:[e.jsx("input",{type:"text",className:a.name?"form-control is-invalid":"form-control",name:"name",value:r.name,id:"name",placeholder:"Name",onChange:s=>o("name",s.target.value),required:!0}),e.jsx("div",{className:"invalid-feedback",children:a.name})]})]}),e.jsxs("div",{className:"form-group row form-item w-100 py-2",children:[e.jsx("label",{htmlFor:"email",className:"col-sm-4 col-form-label",children:"Email"}),e.jsxs("div",{className:"col-sm-8",children:[e.jsx("input",{type:"email",className:a.email?"form-control is-invalid":"form-control",id:"email",name:"email",value:r.email,placeholder:"Email",onChange:s=>o("email",s.target.value)}),e.jsx("div",{className:"invalid-feedback",children:a.email})]})]}),e.jsxs("div",{className:"form-group row form-item w-100 py-2",children:[e.jsx("label",{htmlFor:"inputPassword3",className:"col-sm-4 col-form-label",children:"Password"}),e.jsxs("div",{className:"col-sm-8",children:[e.jsx("input",{type:"password",className:a.password?"form-control is-invalid":"form-control",name:"password",value:r.password,id:"inputPassword3",placeholder:"Password",autoComplete:"new-password",onChange:s=>o("password",s.target.value),required:!0}),e.jsx("div",{className:"invalid-feedback",children:a.password})]})]}),e.jsxs("div",{className:"form-group row form-item w-100 py-2",children:[e.jsx("label",{htmlFor:"password_confirmation",className:"col-sm-4 col-form-label",children:"Confirm Password"}),e.jsxs("div",{className:"col-sm-8",children:[e.jsx("input",{type:"password",className:a.password_confirmation?"form-control is-invalid":"form-control",id:"password_confirmation",placeholder:"Confirm Password",name:"password_confirmation",value:r.password_confirmation,onChange:s=>o("password_confirmation",s.target.value),required:!0}),e.jsx("div",{className:"invalid-feedback",children:a.password_confirmation})]})]}),e.jsx("div",{className:"form-group row justify-content-center",children:e.jsx("div",{className:"col-sm-10 text-center",children:e.jsx("button",{type:"submit",className:`btn border-secondary py-2 px-4 text-uppercase text-primary ${i&&"disabled"}`,children:"Register"})})})]})})})})})})]})}export{h as default};