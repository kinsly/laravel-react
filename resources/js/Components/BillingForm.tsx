import InputLabel from "./Partials/InputLabel";
import InputText from "./Partials/InputText";

export default function BillingForm()
{
  return (
    <div className="col-md-12 col-lg-6 col-xl-7">

      <div className="row">

        <div className="col-md-12 col-lg-6">
          <div className="form-item w-100">
            <InputLabel name="Name" isRequired={true}/>
            <InputText className="form-control" isFocused={true}/> 
          </div>
        </div>

        <div className="col-md-12 col-lg-6">
          <div className="form-item w-100">
            <label className="form-label my-3">
              Last Name<sup>*</sup>
            </label>
            <input type="text" className="form-control" />
          </div>
        </div>
        
      </div>
      
      <div className="form-item">
        <label className="form-label my-3">
          Company Name<sup>*</sup>
        </label>
        <input type="text" className="form-control" />
      </div>
      <div className="form-item">
        <label className="form-label my-3">
          Address <sup>*</sup>
        </label>
        <input
          type="text"
          className="form-control"
          placeholder="House Number Street Name"
        />
      </div>
      <div className="form-item">
        <label className="form-label my-3">
          Town/City<sup>*</sup>
        </label>
        <input type="text" className="form-control" />
      </div>
      <div className="form-item">
        <label className="form-label my-3">
          Country<sup>*</sup>
        </label>
        <input type="text" className="form-control" />
      </div>
      <div className="form-item">
        <label className="form-label my-3">
          Postcode/Zip<sup>*</sup>
        </label>
        <input type="text" className="form-control" />
      </div>
      <div className="form-item">
        <label className="form-label my-3">
          Mobile<sup>*</sup>
        </label>
        <input type="tel" className="form-control" />
      </div>
      <div className="form-item">
        <label className="form-label my-3">
          Email Address<sup>*</sup>
        </label>
        <input type="email" className="form-control" />
      </div>
      <div className="form-check my-3">
        <input
          type="checkbox"
          className="form-check-input"
          id="Account-1"
          name="Accounts"
          defaultValue="Accounts"
        />
        <label className="form-check-label" htmlFor="Account-1">
          Create an account?
        </label>
      </div>
      <hr />
      <div className="form-check my-3">
        <input
          className="form-check-input"
          type="checkbox"
          id="Address-1"
          name="Address"
          defaultValue="Address"
        />
        <label className="form-check-label" htmlFor="Address-1">
          Ship to a different address?
        </label>
      </div>
      <div className="form-item">
        <textarea
          name="text"
          className="form-control"
          spellCheck="false"
          cols={30}
          rows={11}
          placeholder="Oreder Notes (Optional)"
          defaultValue={""}
        />
      </div>
  </div>
  )
}