import App from "../../../components/layouts/App";
import Navbar from "../../../components/layouts/Navbar";

const AfterBooking = () => {
    return (
        <App bottomFooter={"mt-32"}>
            <Navbar />
            <div className="container flex m-auto justify-center mt-32 p-2">
                <div className="border border-2 border-blue-200 font-normal text-[#2769c5] lg:w-1/2 lg:p-24 text-base w-full rounded-xl p-4">
                    <div>Thank you,</div>
                    <div className="mt-4">
                        Your Counselling has been booked. Please check your
                        email to start the Counselling.
                    </div>
                </div>
            </div>
        </App>
    );
};
export default AfterBooking;
