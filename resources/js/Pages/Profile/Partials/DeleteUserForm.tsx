import { useForm } from '@inertiajs/react';
import { useRef, FormEventHandler, useState } from 'react';

export default function DeleteUserForm({ className = '' }: { className?: string })
{
    const [confirmingUserDeletion, setConfirmingUserDeletion] = useState(false);
    const passwordInput = useRef<HTMLInputElement>(null);

    const {
        data,
        setData,
        delete: destroy,
        processing,
        reset,
        errors,
    } = useForm({
        password: '',
    });

    const confirmUserDeletion = () => {
        setConfirmingUserDeletion(true);
    };

    const deleteUser: FormEventHandler = (e) => {
        e.preventDefault();

        destroy(route('profile.destroy'), {
            preserveScroll: true,
            onSuccess: () => {},
            onError: () => {
              // passwordInput.current?.focus()
            },
            onFinish: () => reset(),
        });
    };

  return(
    <>
    <p className="">
        Once your account is deleted, all of its resources and data will be permanently deleted. Before
        deleting your account, please download any data or information that you wish to retain.
    </p>

    <button data-bs-toggle="modal" className='btn btn-danger' data-bs-target="#userDeleteModal">Delete Account</button>
    
    <div className="modal fade bd-example-modal-lg" id="userDeleteModal" tabIndex={-1} aria-hidden="true">
      <div className="modal-dialog" role="document">
        <div className="modal-content">
          <div className="modal-header">
            <h5 className="modal-title" id="exampleModalLabel1">
            Are you sure you want to delete your account?
            </h5>
            <button
              type="button"
              className="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            />
          </div>
          <div className="modal-body">
          <form onSubmit={deleteUser}>
              <p className="mt-1 text-sm text-gray-600">
                  Once your account is deleted, all of its resources and data will be permanently deleted. Please
                  enter your password to confirm you would like to permanently delete your account.
              </p>
              <div className="form-group row form-item w-100 py-2">
                <label htmlFor="delPassword" className="col-sm-4 col-form-label">
                Password
                </label>
                <div className="col-sm-8">
                  <input
                    type="password"
                    className={errors.password ? "form-control is-invalid" : "form-control"} 
                    id="delPassword"
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
               <div className='text-end'> 
               <hr/>
                <button
                  type="button"
                  className="btn btn-outline-secondary mr-2"
                  data-bs-dismiss="modal"
                >
                  Close
                </button> &nbsp;
                <button type="submit" className="btn btn-danger"  data-bs-dismiss="modal">
                  Delete Now
                </button>
                </div>
              </form>
          </div>
          {/* <div className="modal-footer">
          
          </div> */}
        </div>
      </div>
    </div>

    </>
  )
}