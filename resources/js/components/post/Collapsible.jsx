import { useState } from "react";

const Collapsible = ({ children, trigger }) => {
    const [open, setOpen] = useState(true);
    return (
        <>
            <div
                onClick={() => {
                    setOpen(!open);
                }}
            >
                {trigger}
            </div>
            {open && <div>{children}</div>}
        </>
    );
};
export default Collapsible;
