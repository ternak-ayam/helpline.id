import App from "../../../components/layouts/App";
import Navbar from "../../../components/layouts/Navbar";

const Call = () => {
    return (
        <App>
            <Navbar />
            <div className="container flex m-auto justify-center p-2 mb-24 mt-20">
                <div className="border-blue-200 border border-2  rounded-xl w-full flex flex-col justify-center p-2 h-full">
                    <div className="mb-24">
                        <div className="flex-col flex justify-center p-2">
                            <img
                                className="lg:w-32 w-24 rounded-full m-auto"
                                src="https://pyxis.nymag.com/v1/imgs/f47/788/caac0f6d9bc8edc26a8c8b17d69a41e447-02-sherlock.rsquare.w330.jpg"
                                alt=""
                            />
                            <p className="m-auto text-lg font-semibold text-[#2769c5]">
                                Counsellor Name
                            </p>
                            <p className="m-auto text-sm font-medium text-[#2769c5]">
                                Counsellor
                            </p>
                        </div>
                        <div className="">
                            <hr className="w-[10rem] border-1 border-[#28c484] border-dashed rounded-xl rotate-90 mt-24 m-auto" />
                        </div>
                    </div>
                    <div className="flex justify-center mb-2">
                        <div>
                            <button className="bg-gray-400 py-2 px-3 rounded-full mx-1">
                                <i className="fa-solid fa-microphone fa-xl text-white"></i>
                            </button>
                            <button className="p-4 bg-[#28c484] rounded-full mx-1">
                                <i className="fa-sharp fa-solid fa-phone fa-xl text-white"></i>
                            </button>
                            <button className="py-2 px-3 bg-gray-400 rounded-full mx-1">
                                <i className="fa-solid fa-volume-high fa-sm text-white"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </App>
    );
};
export default Call;
