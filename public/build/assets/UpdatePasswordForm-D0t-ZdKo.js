import{r as t,W as f,j as s}from"./app-Bg0_C09o.js";function j({className:x=""}){const i=t.useRef(null),m=t.useRef(null),{data:a,setData:e,errors:o,put:p,reset:n,processing:u,recentlySuccessful:h}=f({current_password:"",password:"",password_confirmation:""}),w=r=>{r.preventDefault(),p(route("password.update"),{preserveScroll:!0,onSuccess:()=>n(),onError:c=>{var l,d;c.password&&(n("password","password_confirmation"),(l=i.current)==null||l.focus()),c.current_password&&(n("current_password"),(d=m.current)==null||d.focus())}})};return s.jsxs("form",{onSubmit:w,children:[s.jsxs("div",{className:"form-group row form-item w-100 py-2",children:[s.jsx("label",{htmlFor:"current_password",className:"col-sm-4 col-form-label",children:"Name"}),s.jsxs("div",{className:"col-sm-8",children:[s.jsx("input",{type:"password",className:o.current_password?"form-control is-invalid":"form-control",id:"current_password",name:"current_password",value:a.current_password,placeholder:"name",onChange:r=>e("current_password",r.target.value)}),s.jsx("div",{className:"invalid-feedback",children:o.current_password})]})]}),s.jsxs("div",{className:"form-group row form-item w-100 py-2",children:[s.jsx("label",{htmlFor:"password",className:"col-sm-4 col-form-label",children:"password"}),s.jsxs("div",{className:"col-sm-8",children:[s.jsx("input",{type:"password",className:o.password?"form-control is-invalid":"form-control",id:"password",name:"password",value:a.password,placeholder:"password",onChange:r=>e("password",r.target.value)}),s.jsx("div",{className:"invalid-feedback",children:o.password})]})]}),s.jsxs("div",{className:"form-group row form-item w-100 py-2",children:[s.jsx("label",{htmlFor:"password_confirmation",className:"col-sm-4 col-form-label",children:"Confirm Password"}),s.jsxs("div",{className:"col-sm-8",children:[s.jsx("input",{type:"password_confirmation",className:o.password_confirmation?"form-control is-invalid":"form-control",id:"password_confirmation",name:"password_confirmation",value:a.password_confirmation,placeholder:"password_confirmation",onChange:r=>e("password_confirmation",r.target.value)}),s.jsx("div",{className:"invalid-feedback",children:o.password_confirmation})]})]}),s.jsx("div",{className:"form-group row justify-content-center",children:s.jsx("div",{className:"col-sm-10 text-center",children:s.jsx("button",{type:"submit",className:`btn border-secondary py-2 px-4 text-uppercase text-primary ${u&&"disabled"}`,children:"Update Password"})})})]})}export{j as default};
