import App from "../../../components/layouts/App";
import Navbar from "../../../components/layouts/Navbar";

const AfterCounselling = () => {
    return (
        <App bottomFooter={"mt-32"}>
            <Navbar />
            <div className="container flex m-auto justify-center mt-32 p-4">
                <div className="border border-2 border-blue-200 text-normal text-base font-normal text-[#2769c5] lg:w-1/2 w-full lg:p-24 rounded-xl p-4 relative">
                    <div>Thank you for using Helpline,</div>
                    <div className="mt-4 mb-16 lg:mb-0">
                        This world is more beautiful with you in it
                        <i className="fa-solid fa-face-smile-wink ml-2"></i>
                    </div>
                    <div className="mt-8 text-end text-base absolute right-6 bottom-4">
                        Click{" "}
                        <a
                            href="resources/js/pages/user/counselling/AfterCounselling"
                            className="underline underline-offset-1"
                        >
                            here,
                        </a>{" "}
                        to start new Counselling
                    </div>
                </div>
            </div>
        </App>
    );
};
export default AfterCounselling;
