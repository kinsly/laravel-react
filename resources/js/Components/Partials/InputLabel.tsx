export default function InputLabel({name, isRequired=false}:{name:string, isRequired?:boolean})
{
  return(
    <label className="form-label my-3">
      {name} {isRequired && <sup>*</sup>}
      
    </label>
  )
}