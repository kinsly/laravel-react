import TabContent from "../TabContent";

export default function SingleItemDescReview({description}: {description:string})
{
  return(
    <>
      <nav>
          <div className="nav nav-tabs mb-3">
            <button
              className="nav-link active border-white border-bottom-0"
              type="button"
              role="tab"
              id="nav-about-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-about"
              aria-controls="nav-about"
              aria-selected="true"
            >
              Description
            </button>
            <button
              className="nav-link border-white border-bottom-0"
              type="button"
              role="tabpanel"
              id="nav-reviews-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-reviews"
              aria-controls="nav-reviews"
              aria-selected="false"
            >
              Reviews
            </button>
          </div>
        </nav>
        <div className="tab-content mb-5">
          <TabContent
            isActive={true}
            tabId="nav-about"
            role="tabpanel"
            tabNavId="nav-about-tab">
            <div dangerouslySetInnerHTML={{ __html: description }} />
          </TabContent>

          <TabContent
           isActive={false}
           tabId="nav-reviews"
           role="tabpanel"
           tabNavId="nav-reviews-tab">
 <div className="d-flex">
              <img
                src="/theme/img/avatar.jpg"
                className="img-fluid rounded-circle p-3"
                style={{ width: 100, height: 100 }}
                alt=""
              />
              <div className="">
                <p className="mb-2" style={{ fontSize: 14 }}>
                  April 12, 2024
                </p>
                <div className="d-flex justify-content-between">
                  <h5>Jason Smith</h5>
                  <div className="d-flex mb-3">
                    <i className="fa fa-star text-secondary" />
                    <i className="fa fa-star text-secondary" />
                    <i className="fa fa-star text-secondary" />
                    <i className="fa fa-star text-secondary" />
                    <i className="fa fa-star" />
                  </div>
                </div>
                <p>
                  Coming soon feature.
                </p>
              </div>
            </div>
            <div className="d-flex">
              <img
                src="/theme/img/avatar.jpg"
                className="img-fluid rounded-circle p-3"
                style={{ width: 100, height: 100 }}
                alt=""
              />
              <div className="">
                <p className="mb-2" style={{ fontSize: 14 }}>
                  April 12, 2024
                </p>
                <div className="d-flex justify-content-between">
                  <h5>Sam Peters</h5>
                  <div className="d-flex mb-3">
                    <i className="fa fa-star text-secondary" />
                    <i className="fa fa-star text-secondary" />
                    <i className="fa fa-star text-secondary" />
                    <i className="fa fa-star" />
                    <i className="fa fa-star" />
                  </div>
                </div>
                <p className="text-dark">
                Coming soon feature.
                </p>
              </div>
            </div>
           </TabContent>
        </div>
    </>
  )
}