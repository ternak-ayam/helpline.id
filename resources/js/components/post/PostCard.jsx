import { Link } from "react-router-dom";
import { useState } from "react";
import ReactPaginate from "react-paginate";

const PostCard = ({ posts, itemsPerPage }) => {
    const [itemOffset, setItemOffset] = useState(0);
    const endOffset = itemOffset + itemsPerPage;
    const currentItems = posts.slice(itemOffset, endOffset);
    const pageCount = Math.ceil(posts.length / itemsPerPage);

    const handlePageClick = (event) => {
        const newOffset = (event.selected * itemsPerPage) % items.length;

        setItemOffset(newOffset);
    };

    const Items = ({ currentItems }) => {
        return (
            <>
                {currentItems &&
                    currentItems.map((post, key) => (
                        <div
                            className="border-1 border-blue-500 mt-8"
                            key={key}
                        >
                            <div className="bg-[#2769c5] lg:h-[5rem] lg:w-[90%] w-full rounded-r-full mt-4 p-2 flex items-center relative">
                                <div className="px-4 rounded-full flex items-center lg:ml-4">
                                    <img
                                        className="w-[50px] p-2 rounded-full bg-[#28c484]"
                                        src={
                                            process.env.MIX_APP_URL +
                                            "/assets/iconlove.png"
                                        }
                                        alt=""
                                    />
                                </div>
                                <div className="lg:text-3xl text-white font-semibold text-xl">
                                    {post.title}{" "}
                                    <i className="fa-solid fa-camera p-2 bg-white lg:fa-xl rounded-full text-[#2769c5]"></i>
                                </div>
                                <div className="lg:absolute right-8 md:absolute">
                                    <img
                                        className="lg:w-[30px] w-[20px] rotate-180"
                                        src={
                                            process.env.MIX_APP_URL +
                                            "/assets/segitiga.png"
                                        }
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div className="lg:ml-8 lg:w-[80%] w-[90%] p-2 lg:p-8 border border-1 border-[#2769c5] rounded-2xl lg:mt-[-4rem] mt-[-1rem] ">
                                <div className="text-justify text-[#2769c5] lg:mt-16 mt-2 text-lg font-semibold p-2">
                                    <div
                                        dangerouslySetInnerHTML={{
                                            __html: post.body,
                                        }}
                                    ></div>
                                </div>
                                <div className="mt-2 flex justify-end">
                                    <Link
                                        to={"/posts/" + post.postId}
                                        className="bg-[#28c484] py-2 px-4 text-white text-lg rounded-full"
                                    >
                                        Read More{" "}
                                        <i className="fas fa-arrow-right"></i>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    ))}
            </>
        );
    };

    return (
        <>
            <Items currentItems={currentItems} />
            <ReactPaginate
                breakLabel="..."
                nextLabel={<i className={"fas fa-arrow-right"}></i>}
                onPageChange={handlePageClick}
                pageRangeDisplayed={5}
                pageCount={pageCount}
                previousLabel={<i className={"fas fa-arrow-left"}></i>}
                pageClassName="p-2 rounded-2xl"
                pageLinkClassName="p-2 rounded-2xl"
                previousClassName="p-2 rounded-2xl"
                previousLinkClassName="p-2 rounded-2xl"
                nextClassName="p-2 rounded-2xl"
                nextLinkClassName="p-2 rounded-2xl"
                breakClassName="page-item"
                breakLinkClassName="page-link"
                containerClassName="justify-center mt-4 p-4 flex gap-2"
                activeClassName="bg-blue-500 text-white p-2 rounded-2xl"
                renderOnZeroPageCount={null}
            />
        </>
    );
};
export default PostCard;
