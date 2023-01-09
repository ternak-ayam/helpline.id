import AdvanceFooter from "../../../components/footer/AdvanceFooter";
import FloatQuestionButton from "../../../components/button/FloatQuestionButton";
import { Link } from "react-router-dom";
import PostCard from "../../../components/post/PostCard";
import AdvanceNavbar from "../../../components/layouts/AdvanceNavbar";
import { useDispatch, useSelector } from "react-redux";
import { useEffect } from "react";
import { getPostList } from "../../../actions/blog";

const Dashboard = () => {
    const dispatch = useDispatch();

    const { posts } = useSelector((state) => state.blog);

    useEffect(() => {
        dispatch(getPostList());
    }, []);

    return (
        <div>
            <AdvanceNavbar />
            <div>
                <div className="container m-auto">
                    <div className="grid lg:grid-cols-2 grid-cols-1 mt-8">
                        <div className="col-span-1 p-2">
                            <div className="flex flex-col gap-4">
                                <div className="lg:text-5xl text-blue-600 font-semibold text-2xl">
                                    We're waiting for your call
                                </div>
                                <div className="lg:text-2xl text-xl text-blue-600 font-normal">
                                    Whatever you're going through, we will face
                                    it with you.
                                </div>
                                <div className="lg:text-2xl text-xl text-blue-600 font-normal mt-4">
                                    We're here 24 hours a day, 365 days a year.
                                </div>
                                <div>
                                    <Link
                                        to={"/counsellors"}
                                        className=" text-center px-4 py-2  mt-4 rounded-full  bg-[#28c484] lg:text-2xl lg:font-normal text-white w-1/3"
                                    >
                                        Chat With Us
                                    </Link>
                                </div>
                            </div>
                        </div>
                        <div className="col-span-1 lg:mt-0 mt-4 p-2">
                            <div className="flex flex-col gap-4 text-end justify-end">
                                <div className="lg:text-5xl text-blue-600 font-semibold text-2xl">
                                    منتظر تماس شما هستیم
                                </div>
                                <div className="lg:text-2xl text-xl text-blue-600 font-normal">
                                    هر چه را که گذرانده اید، ما با شما روبرو
                                    خواهیم شد.
                                </div>
                                <div className="lg:text-2xl text-xl text-blue-600 font-normal mt-4">
                                    ما 24 ساعت شبانه روز و 365 روز سال اینجا
                                    هستیم.
                                </div>
                                <div>
                                    <Link
                                        to={"/counsellors"}
                                        className="text-center px-4 py-2 bg-[#28c484]  mt-4 rounded-full   lg:text-2xl lg:font-normal text-white w-1/3"
                                    >
                                        دردش معنا
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <FloatQuestionButton />
                {posts.map((post, key) => (
                    <PostCard key={key} post={post} />
                ))}
            </div>

            <AdvanceFooter />
        </div>
    );
};

export default Dashboard;
