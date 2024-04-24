import React, { useEffect, useState } from "react"

export default function Keywords(
  {
    className,
    onChange,
    defaultValue,
  }:
  {
    className:string,
    onChange: (keyword:string) => void,
    defaultValue:string
  }
)
{

 const [keyword, setKeyword] = useState('');

  const handleOnChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setKeyword(e.target.value);
    onChange(e.target.value)
  }

  useEffect(()=>{
    setKeyword(defaultValue)
  }, [defaultValue])

  return(
    <div className={className}>
      <input
        type="search"
        className="form-control p-3"
        placeholder="Search Fruits"
        id="keyword"
        name="keyword"
        value={keyword}
        onChange={handleOnChange}
      />
      <span id="search-icon-1" className="input-group-text p-3">
        <i className="fa fa-search" />
      </span>
    </div>
  )
}