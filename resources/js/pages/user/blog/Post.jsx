import AdvanceFooter from "../../../components/footer/AdvanceFooter";
import Navbar from "../../../components/layouts/Navbar";
import { useParams } from "react-router-dom";
import { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
import { getPostDetail } from "../../../actions/blog";

const Post = () => {
    const { postId } = useParams();
    const dispatch = useDispatch();

    const { post } = useSelector((state) => state.blog);

    useEffect(() => {
        window.scrollTo(0, 0);
        dispatch(getPostDetail(postId));
    }, [postId]);

    return (
        <>
            <div className={"mx-4"}>
                <Navbar />
                <div className={"content"}>
                    <article className="max-w-4xl px-6 py-12 mx-auto space-y-12">
                        <div className="w-full mx-auto space-y-4 text-center">
                            <h1 className="text-4xl font-bold leading-tight md:text-5xl">
                                {post.title}
                            </h1>
                            <p className="text-sm">
                                by{" "}
                                <a
                                    rel="noopener noreferrer"
                                    className="underline"
                                >
                                    <span itemProp="name">
                                        {post.createdBy}
                                    </span>
                                </a>{" "}
                                on{" "}
                                <time dateTime="2021-02-12 15:34:18-0200">
                                    {new Date(post.createdAt).toString()}
                                </time>
                            </p>
                        </div>
                        <div className="break-all">
                            <div
                                dangerouslySetInnerHTML={{
                                    __html: post.body?.replace(
                                        "Powered by Froala Editor",
                                        ""
                                    ),
                                }}
                            ></div>
                        </div>
                        <div className={"mt-4"}>
                            <h3 className={"my-2 font-bold"}>Tags</h3>
                            <div className={"flex gap-2"}>
                                {post.tags.map((tag, key) => (
                                    <div
                                        key={key}
                                        className={
                                            "px-4 py-2 bg-gray-100 text-gray-500 rounded-full w-fit"
                                        }
                                    >
                                        {tag}
                                    </div>
                                ))}
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <AdvanceFooter />
        </>
    );
};
export default Post;
