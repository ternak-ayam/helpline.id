import App from "../../../components/layouts/App";
import Navbar from "../../../components/layouts/Navbar";

const Chat = () => {
    return (
        <App>
            <Navbar />

            <div class="container flex m-auto justify-center p-2 mb-24">
                <div class="border-blue-200 border border-2 rounded-xl w-full flex flex-col justify-center p-4 h-full gap-4">
                    <div class="flex">
                        <div class="flex gap-4">
                            <div>
                                <img
                                    class="lg:w-16 rounded-full m-auto"
                                    src="https://pyxis.nymag.com/v1/imgs/f47/788/caac0f6d9bc8edc26a8c8b17d69a41e447-02-sherlock.rsquare.w330.jpg"
                                    alt=""
                                />
                            </div>
                            <div>
                                <div class="lg:max-w-lg w-full border py-2 px-4 border-2 border-blue-200 rounded-br-2xl text-black rounded-tr-2xl rounded-tl-2xl lg:text-lg text-sm">
                                    Lorem ipsum dolor sit, amet consectetur
                                    adipisicing elit. Quod debitis totam in
                                    accusantium saepe asperiores facere nam esse
                                    eius maiores? Odio hic assumenda sunt
                                    pariatur sint repudiandae nam voluptate
                                    excepturi.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <div class="flex gap-4">
                            <div>
                                <div class="lg:max-w-lg w-full border py-2 px-4 border-2 border-blue-200 rounded-bl-2xl text-black rounded-tl-2xl rounded-tr-2xl lg:text-lg text-sm">
                                    Lorem ipsum dolor sit, amet consectetur
                                    adipisicing elit. Quod debitis totam in
                                    accusantium saepe asperiores facere nam esse
                                    eius maiores? Odio hic assumenda sunt
                                    pariatur sint repudiandae nam voluptate
                                    excepturi.
                                </div>
                            </div>
                            <div>
                                <img
                                    class="lg:w-16 rounded-full m-auto"
                                    src="https://pyxis.nymag.com/v1/imgs/f47/788/caac0f6d9bc8edc26a8c8b17d69a41e447-02-sherlock.rsquare.w330.jpg"
                                    alt=""
                                />
                            </div>
                        </div>
                    </div>
                    <div class="lg:p-4 p-1  w-full">
                        <form action="" class="w-full flex justify-center">
                            <div class="lg:w-1/2 w-full border border-2 rounded-xl border-blue-200 p-2 flex">
                                <input
                                    type="text"
                                    value=""
                                    class="border-none focus:outline-none w-full"
                                    placeholder="type here . . ."
                                />
                                <button>
                                    <a href="">
                                        <i class="fa-solid fa-share-from-square text-blue-200"></i>
                                    </a>
                                </button>
                            </div>
                            <div class="flex items-center ml-1">
                                <button
                                    type="submit"
                                    class="lg:w-32 w-24  bg-blue-600 py-2 px-4  rounded-xl lg:text-white m-auto lg:text-medium text-sm"
                                >
                                    <i class="fa-solid fa-paper-plane text-white mr-2"></i>
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </App>
    );
};
export default Chat;
