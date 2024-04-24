import { EventHandler, useEffect, useState } from "react";

export default function PriceSlider({onPriceChange, defaultPrice}:{ onPriceChange: (price:number) => void, defaultPrice:number })
{
  const [price, setPrice] = useState(0);


  const handleInputChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    setPrice(parseInt(event.target.value));
  }

  const handleSliderChange = ()=> {
    onPriceChange(price);
  }


  useEffect(() => {
    setPrice(defaultPrice);
  },[defaultPrice])

  return(
    <div className="mb-3">
      <h4 className="mb-2">Price</h4>
      <input
        type="range"
        className="form-range w-100"
        id="rangeInput"
        name="rangeInput"
        min={0}
        max={100}
        value={price}
        onInput={handleInputChange}
        onMouseUp={handleSliderChange}
      />
      <output
        id="amount"
        name="amount"
        min-velue={0}
        max-value={500}
        htmlFor="rangeInput"
      >
        {price}
      </output>
    </div>
  )
}