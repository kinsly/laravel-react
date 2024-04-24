import FeatureAd from "./Partials/FeatureAd"

export default function FeatureAds()
{
  return (
    <div className="container-fluid service py-5">
            <div className="container py-5">
            <div className="row g-4 justify-content-center">

                <FeatureAd
                    src="/theme/img/featur-1.jpg"
                    title="Fresh Apples"
                    discount="20% OFF"
                    footerColor="bg-secondary"
                    bannerColor="bg-primary"
                    textColor="text-white"
                />

                <FeatureAd
                    src="/theme/img/featur-2.jpg"
                    title="Tasty Fruits"
                    discount="Free delivery"
                    footerColor="bg-dark"
                    bannerColor="bg-light"
                    textColor="text-primary"
                />

                <FeatureAd
                    src="/theme/img/featur-3.jpg"
                    title="Exotic Vegitable"
                    discount="Discount 30$"
                    footerColor="bg-primary"
                    bannerColor="bg-secondary"
                    textColor="text-white"
                />    

                
            </div>
            </div>
        </div>
  )
}