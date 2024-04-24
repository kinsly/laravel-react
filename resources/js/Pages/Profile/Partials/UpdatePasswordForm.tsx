import { useForm } from '@inertiajs/react';
import { useRef, FormEventHandler } from 'react';

export default function UpdatePasswordForm({ className = '' }: { className?: string })
{
  const passwordInput = useRef<HTMLInputElement>(null);
    const currentPasswordInput = useRef<HTMLInputElement>(null);

    const { data, setData, errors, put, reset, processing, recentlySuccessful } = useForm({
        current_password: '',
        password: '',
        password_confirmation: '',
    });

    const updatePassword: FormEventHandler = (e) => {
        e.preventDefault();

        put(route('password.update'), {
            preserveScroll: true,
            onSuccess: () => reset(),
            onError: (errors) => {
                if (errors.password) {
                    reset('password', 'password_confirmation');
                    passwordInput.current?.focus();
                }

                if (errors.current_password) {
                    reset('current_password');
                    currentPasswordInput.current?.focus();
                }
            },
        });
    };

  return(
    <form  onSubmit={updatePassword}>

    <div className="form-group row form-item w-100 py-2">
      <label htmlFor="current_password" className="col-sm-4 col-form-label">
        Name
      </label>
      <div className="col-sm-8">
        <input
          type="password"
          className={errors.current_password ? "form-control is-invalid" : "form-control"} 
          id="current_password"
          name="current_password"
          value={data.current_password}
          placeholder="name"
          onChange={(e) => setData('current_password', e.target.value)}
        />
        <div className="invalid-feedback">
          {errors.current_password}
        </div>
      </div>
      
    </div>

    <div className="form-group row form-item w-100 py-2">
      <label htmlFor="password" className="col-sm-4 col-form-label">
      password
      </label>
      <div className="col-sm-8">
        <input
          type="password"
          className={errors.password ? "form-control is-invalid" : "form-control"} 
          id="password"
          name="password"
          value={data.password}
          placeholder="password"
          onChange={(e) => setData('password', e.target.value)}
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
          type="password_confirmation"
          className={errors.password_confirmation ? "form-control is-invalid" : "form-control"} 
          id="password_confirmation"
          name="password_confirmation"
          value={data.password_confirmation}
          placeholder="password_confirmation"
          onChange={(e) => setData('password_confirmation', e.target.value)}
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
          Update Password
        </button>
      </div>
    </div>
  </form>
  )
}