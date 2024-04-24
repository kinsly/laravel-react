
import { PageProps } from "@/types";
import {Link, useForm, usePage } from "@inertiajs/react";
import { FormEventHandler, useState } from "react";

export default function UpdateProfileInformation({ mustVerifyEmail, status, className = '' }: { mustVerifyEmail: boolean, status?: string, className?: string }){
  const user = usePage<PageProps>().props.auth.user;
  const [updating, setUpdating] = useState(false)
  const { data, setData, patch, errors, processing, recentlySuccessful } = useForm({
      name: user.name,
      email: user.email,
  });

  const submit: FormEventHandler = (e) => {
      e.preventDefault();

      patch(route('profile.update'),{
        preserveState:true, 
        preserveScroll:true,
        onBefore:() => {setUpdating(true)},
        onFinish:() => {setUpdating(false)},

      });
  };

  return(
    
        <form onSubmit={submit}>

        <div className="form-group row form-item w-100 py-2">
          <label htmlFor="name" className="col-sm-4 col-form-label">
            Name
          </label>
          <div className="col-sm-8">
            <input
              type="name"
              className={errors.name ? "form-control is-invalid" : "form-control"} 
              id="name"
              name="name"
              value={data.name}
              placeholder="name"
              onChange={(e) => setData('name', e.target.value)}
            />
            <div className="invalid-feedback">
              {errors.email}
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

        {mustVerifyEmail && user.email_verified_at === null && (
              <div>
                  <p className="">
                      Your email address is unverified.
                      <Link
                          href={route('verification.send')}
                          method="post"
                          as="button"
                          className=""
                      >
                          Click here to re-send the verification email.
                      </Link>
                  </p>

                  {status === 'verification-link-sent' && (
                      <div className="">
                          A new verification link has been sent to your email address.
                      </div>
                  )}
              </div>
          )}
        


        <div className="form-group row justify-content-center">
          <div className="col-sm-10 text-center">
          <button
              type="submit"
              className={`btn border-secondary py-2 px-4 text-uppercase text-primary ${processing && 'disabled'}`}
            >
             {updating?'loading...': 'Update Profile' } 
            </button>
          </div>
        </div>
      </form>
      
  )
}