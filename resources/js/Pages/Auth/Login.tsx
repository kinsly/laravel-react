import InputLabel from "@/Components/Partials/InputLabel";
import InputText from "@/Components/Partials/InputText";
import SinglePageHeader from "@/Components/SinglePageHeader";
import GuestLayout from "@/Layouts/GuestLayout";
import { Head, useForm } from "@inertiajs/react";
import { FormEventHandler, useEffect, useRef } from "react";

export default function Login({ status, canResetPassword }: { status?: string, canResetPassword: boolean }){
  const { data, setData, post, processing, errors, reset } = useForm({
    email: '',
    password: '',
    remember: false,
  });

  const scrollToView = useRef<HTMLDivElement>(null);

  useEffect(() => {
    scrollToView.current?.scrollIntoView({ behavior: 'smooth' });
      return () => {
          reset('password');
      };
  }, []);

  const submit: FormEventHandler = (e) => {
      e.preventDefault();
      post(route('buyer.login'),{
        preserveScroll:true
      });
  };

  return(
    <GuestLayout>
      <Head title="Log in" />
      <SinglePageHeader title="Login"/>
      <div className="container-fluid py-5" ref={scrollToView}>
        <div className="container col-md-6">
         <div className="justify-content-center">
          <div className="card">
            <div className="card-body">
            {status && <div className="alert alert-primary">{status}</div>}

            
            <form onSubmit={submit}>

              <div className="form-group row form-item w-100 py-2">
                <label htmlFor="email" className="col-sm-4 col-form-label">
                  Email
                </label>
                <div className="col-sm-8">
                  <input
                    type="email"
                    className={errors.email ? "form-control is-invalid" : "form-control"} 
                    id="email"
                    name="email"
                    value={data.email}
                    placeholder="Email"
                    onChange={(e) => setData('email', e.target.value)}
                  />
                  <div className="invalid-feedback">
                    {errors.email}
                  </div>
                </div>
                
              </div>

              <div className="form-group row form-item w-100 py-2">
                <label htmlFor="inputPassword" className="col-sm-4 col-form-label">
                  Password
                </label>
                <div className="col-sm-8">
                  <input
                    type="password"
                    className={errors.password ? "form-control is-invalid" : "form-control"} 
                    name="password"
                    value={data.password}
                    id="inputPassword"
                    placeholder="Password"
                    autoComplete="new-password"
                    onChange={(e) => setData('password', e.target.value)}
                    required
                  />
                  <div className="invalid-feedback">
                    {errors.password}
                  </div>
                </div>
              </div>

              <div className="form-check">
                <input type="checkbox" 
                  className="form-check-input" 
                  id="checkbox" 
                  checked={data.remember}
                  onChange={(e) => setData('remember', e.target.checked)}/>

                <label className="form-check-label" htmlFor="checkbox">
                  Remember Me
                </label>
              </div>

              <div className="form-group row justify-content-center">
                <div className="col-sm-10 text-center">
                <button
                    id='submitBtn'
                    type="submit"
                    className={`btn border-secondary py-2 px-4 text-uppercase text-primary ${processing && 'disabled'}`}
                  >
                    Login
                  </button>
                </div>
              </div>
            </form>

            </div>
          </div>
        </div> 

         
         
        </div>
      </div>
    </GuestLayout>
  )
}