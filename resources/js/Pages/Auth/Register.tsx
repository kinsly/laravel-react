import InputLabel from "@/Components/Partials/InputLabel";
import InputText from "@/Components/Partials/InputText";
import SinglePageHeader from "@/Components/SinglePageHeader";
import GuestLayout from "@/Layouts/GuestLayout";
import { useForm } from "@inertiajs/react";
import { FormEventHandler, useEffect } from "react";

export default function Register(){
  const { data, setData, post, processing, errors, reset } = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  });

  useEffect(() => {
      return () => {
          reset('password', 'password_confirmation');
      };
  }, []);

  const submit: FormEventHandler = (e) => {
      e.preventDefault();

      post(route('buyer.storeRegister'));
  };

  return(
    <GuestLayout>
      <SinglePageHeader title="Register Now"/>
      <div className="container-fluid py-5">
        <div className="container col-md-6">
         <div className="justify-content-center">
          <div className="card">
            <div className="card-body">
            <form onSubmit={submit}>

            <div className="form-group row form-item w-100 py-2">
                <label htmlFor="name" className="col-sm-4 col-form-label">
                  Name
                </label>
                <div className="col-sm-8">
                  <input
                    type="text"
                    className={errors.name ? "form-control is-invalid" : "form-control"} 
                    name="name"
                    value={data.name}
                    id="name"
                    placeholder="Name"
                    onChange={(e) => setData('name', e.target.value)}
                    required
                  />
                  <div className="invalid-feedback">
                    {errors.name}
                  </div>
                </div>
              </div>

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
                <label htmlFor="inputPassword3" className="col-sm-4 col-form-label">
                  Password
                </label>
                <div className="col-sm-8">
                  <input
                    type="password"
                    className={errors.password ? "form-control is-invalid" : "form-control"} 
                    name="password"
                    value={data.password}
                    id="inputPassword3"
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

              <div className="form-group row form-item w-100 py-2">
                <label htmlFor="password_confirmation" className="col-sm-4 col-form-label">
                  Confirm Password
                </label>
                <div className="col-sm-8">
                  <input
                    type="password"
                    className={errors.password_confirmation ? "form-control is-invalid" : "form-control"} 
                    id="password_confirmation"
                    placeholder="Confirm Password"
                    name="password_confirmation"
                    value={data.password_confirmation}
                    onChange={(e) => setData('password_confirmation', e.target.value)}
                    required
                  />
                  <div className="invalid-feedback">
                    {errors.password_confirmation}
                  </div>
                </div>
              </div>
              
              <div className="form-group row justify-content-center">
                <div className="col-sm-10 text-center">
                <button
                    type="submit"
                    className={`btn border-secondary py-2 px-4 text-uppercase text-primary ${processing && 'disabled'}`}
                  >
                    Register
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