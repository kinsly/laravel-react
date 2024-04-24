import { PropsWithChildren } from "react";

export default function TabContent({
  children,
  isActive,
  tabId,
  role,
  tabNavId
}:PropsWithChildren<
{
  isActive:boolean,
  tabId:string,
  role:string,
  tabNavId:string
}
>)
{
  var activeClass = (isActive) ?'active' : '';
  return(
      <div className={`tab-pane ${activeClass}`}  id={tabId}  role={role}  aria-labelledby={tabNavId}>
        {children}
      </div>
    
  )
}