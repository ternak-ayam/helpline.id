import { Link } from "react-router-dom";
import { useSelector } from "react-redux";

const Navbar = ({ showUser = true }) => {
    return (
        <>
            <div className={"flex justify-between p-2"}>
                <a href={"/"} className={"w-48"}>
                    <img
                        src={
                            process.env.MIX_APP_URL +
                            "/assets/logo_helpline.png"
                        }
                        alt="Logo Helpline"
                    />
                </a>
                {showUser && (
                    <Link to={"/profile"}>
                        <img
                            className={"rounded-full w-20 h-20"}
                            src={process.env.MIX_DEFAULT_PROFILE_PICTURE}
                            alt="Profile Picture"
                        />
                    </Link>
                )}
            </div>
        </>
    );
};
export default Navbar;
