import{W as p,r as i,j as e,a as h}from"./app-vNBdrkJc.js";import{S as u}from"./SinglePageHeader-D5U_hmEV.js";import{G as x}from"./GuestLayout-BtzcZuSC.js";function w({status:o,canResetPassword:f}){const{data:a,setData:l,post:t,processing:m,errors:r,reset:n}=p({email:"",password:"",remember:!1}),c=i.useRef(null);i.useEffect(()=>{var s;return(s=c.current)==null||s.scrollIntoView({behavior:"smooth"}),()=>{n("password")}},[]);const d=s=>{s.preventDefault(),t(route("buyer.login"),{preserveScroll:!0})};return e.jsxs(x,{children:[e.jsx(h,{title:"Log in"}),e.jsx(u,{title:"Login"}),e.jsx("div",{className:"container-fluid py-5",ref:c,children:e.jsx("div",{className:"container col-md-6",children:e.jsx("div",{className:"justify-content-center",children:e.jsx("div",{className:"card",children:e.jsxs("div",{className:"card-body",children:[o&&e.jsx("div",{className:"alert alert-primary",children:o}),e.jsxs("form",{onSubmit:d,children:[e.jsxs("div",{className:"form-group row form-item w-100 py-2",children:[e.jsx("label",{htmlFor:"email",className:"col-sm-4 col-form-label",children:"Email"}),e.jsxs("div",{className:"col-sm-8",children:[e.jsx("input",{type:"email",className:r.email?"form-control is-invalid":"form-control",id:"email",name:"email",value:a.email,placeholder:"Email",onChange:s=>l("email",s.target.value)}),e.jsx("div",{className:"invalid-feedback",children:r.email})]})]}),e.jsxs("div",{className:"form-group row form-item w-100 py-2",children:[e.jsx("label",{htmlFor:"inputPassword3",className:"col-sm-4 col-form-label",children:"Password"}),e.jsxs("div",{className:"col-sm-8",children:[e.jsx("input",{type:"password",className:r.password?"form-control is-invalid":"form-control",name:"password",value:a.password,id:"inputPassword3",placeholder:"Password",autoComplete:"new-password",onChange:s=>l("password",s.target.value),required:!0}),e.jsx("div",{className:"invalid-feedback",children:r.password})]})]}),e.jsxs("div",{className:"form-check",children:[e.jsx("input",{type:"checkbox",className:"form-check-input",id:"checkbox",checked:a.remember,onChange:s=>l("remember",s.target.checked)}),e.jsx("label",{className:"form-check-label",htmlFor:"checkbox",children:"Remember Me"})]}),e.jsx("div",{className:"form-group row justify-content-center",children:e.jsx("div",{className:"col-sm-10 text-center",children:e.jsx("button",{type:"submit",className:`btn border-secondary py-2 px-4 text-uppercase text-primary ${m&&"disabled"}`,children:"Login"})})})]})]})})})})})]})}export{w as default};