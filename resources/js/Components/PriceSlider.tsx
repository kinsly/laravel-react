import { EventHandler, useEffect, useState } from "react";

export default function PriceSlider({onPriceChange, defaultPrice}:{ onPriceChange: (price:number) => void, defaultPrice:number })
{
  const [price, setPrice] = useState(0);
  const [testname, setTestName] = useState('Price s');

  const handleInputChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    setTestName('price changed');
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
      <h4 className="mb-2">{testname}</h4>
      <input
        id="priceSlider"
        type="range"
        className="form-range w-100"
        min={0}
        max={100}
        value={price}
        onInput={handleInputChange}
        onMouseUp={handleSliderChange}
      />
      <output
        min-value={0}
        max-value={100}
      >
        {price}
      </output>
    </div>
  )
}