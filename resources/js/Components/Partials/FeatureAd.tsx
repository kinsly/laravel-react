export default function FeatureAd(
  {src,title,discount, footerColor, bannerColor, textColor}: 
  { src:string, 
    title:string, 
    discount:string, 
    footerColor:'bg-secondary'|'bg-dark'|'bg-primary', 
    bannerColor:'bg-primary'|'bg-light'|'bg-secondary'
    textColor: 'text-white' | 'text-primary'
  })
{
  return (
    <div className="col-md-6 col-lg-4">
        <a href="#">
          <div className={`service-item ${footerColor} rounded border border-secondary`}>
            <img
                src={src}
                className="img-fluid rounded-top w-100"
                alt=""
            />
            <div className="px-4 rounded-bottom">
                <div className={`service-content ${bannerColor} text-center p-4 rounded`}>
                <h5 className={textColor}>{title}</h5>
                <h3 className="mb-0">{discount}</h3>
                </div>
            </div>
          </div>
        </a>
    </div>
  )
}