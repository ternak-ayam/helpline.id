const Navbar = () => {
    return (
        <>
            <div className={"flex justify-between"}>
                <a href={"/"} className={"w-48"}>
                    <img
                        src={
                            process.env.MIX_APP_URL +
                            "/assets/logo_helpline.png"
                        }
                        alt="Logo Helpline"
                    />
                </a>
            </div>
        </>
    );
};
export default Navbar;
