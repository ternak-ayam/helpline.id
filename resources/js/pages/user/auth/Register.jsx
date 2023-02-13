import * as React from "react";
import Button from "@mui/material/Button";
import CssBaseline from "@mui/material/CssBaseline";
import TextField from "@mui/material/TextField";
import Box from "@mui/material/Box";
import Typography from "@mui/material/Typography";
import Container from "@mui/material/Container";
import Navbar from "../../../components/layouts/Navbar";
import Guest from "../../../components/layouts/Guest";
import { useHistory, Link } from "react-router-dom";
import countries from "../../../../../storage/app/local/countries.json";
import cities from "../../../../../storage/app/local/cities.json";
import {
    Checkbox,
    FormControl,
    FormControlLabel,
    FormLabel,
    InputLabel,
    MenuItem,
    Radio,
    RadioGroup,
    Select,
} from "@mui/material";
import { useDispatch, useSelector } from "react-redux";
import { register } from "../../../actions/auth";
import { useState } from "react";
import LoadingButton from "@mui/lab/LoadingButton";

const Register = () => {
    const [userData, setUserData] = useState({
        name: "",
        email: "",
        unhcr: "",
        city: "",
        birthdate: "",
        country: "",
        sex: "",
        password: "",
        informedConsent: "",
        informedAddress: "",
        informedLimitation: "",
    });

    const [loading, setLoading] = useState(false);

    const history = useHistory();
    const dispatch = useDispatch();

    const { isLoggedIn } = useSelector((state) => state.auth);

    if (isLoggedIn) history.push("/counsellors");

    const handleRegister = () => {
        setLoading(true);
        dispatch(register(userData))
            .then(() => {
                history.push("/counsellors");
            })
            .catch(() => {
                setLoading(false);
            });
    };

    return (
        <>
            <Guest imageHeight={"146vh"} bottomFooter={"-bottom-72"}>
                <Navbar showUser={false} />
                <Container component="main" maxWidth="xs">
                    <CssBaseline />
                    <Box
                        sx={{
                            marginBottom: 4,
                            display: "flex",
                            flexDirection: "column",
                            alignItems: "center",
                        }}
                    >
                        <Typography
                            component="h1"
                            sx={{ fontWeight: "bold" }}
                            variant="h5"
                            color={"primary"}
                        >
                            CREATE ACCOUNT
                        </Typography>
                        <Typography
                            component="span"
                            variant="span"
                            color={"primary"}
                        >
                            It's quick and easy.
                        </Typography>
                        <Box component="form" noValidate sx={{ mt: 1 }}>
                            <InputLabel
                                id="select-name"
                                className={"text-[#1565c0] font-bold mt-2"}
                            >
                                Name
                            </InputLabel>
                            <TextField
                                sx={{
                                    label: { color: "#1565c0" },
                                }}
                                className={"bg-blue-50 border-0 mt-0"}
                                required
                                fullWidth
                                type="text"
                                onChange={(e) =>
                                    setUserData({
                                        ...userData,
                                        name: e.target.value,
                                    })
                                }
                                value={userData.name}
                                id="name"
                                labelid="select-name"
                                name="name"
                                InputLabelProps={{ shrink: true }}
                                autoFocus
                            />
                            <InputLabel
                                id="select-email"
                                className={"text-[#1565c0] font-bold mt-2"}
                            >
                                Email Address
                            </InputLabel>
                            <TextField
                                sx={{
                                    label: { color: "#1565c0" },
                                }}
                                className={"bg-blue-50 border-0 mt-0"}
                                required
                                fullWidth
                                type="email"
                                onChange={(e) =>
                                    setUserData({
                                        ...userData,
                                        email: e.target.value,
                                    })
                                }
                                value={userData.email}
                                id="email"
                                labelid="select-email"
                                name="email"
                                InputLabelProps={{ shrink: true }}
                            />
                            <InputLabel
                                id="select-unhcr"
                                className={"text-[#1565c0] font-bold mt-2"}
                            >
                                UNHCR Number
                            </InputLabel>
                            <TextField
                                sx={{
                                    label: { color: "#1565c0" },
                                }}
                                className={"bg-blue-50 border-0 mt-0"}
                                required
                                fullWidth
                                labelid="select-unhcr"
                                onChange={(e) =>
                                    setUserData({
                                        ...userData,
                                        unhcr: e.target.value,
                                    })
                                }
                                value={userData.unhcr}
                                type="text"
                                id="unhcr"
                                name="unhcr"
                                InputLabelProps={{ shrink: true }}
                            />
                            <InputLabel
                                id="select-city"
                                className={"text-[#1565c0] font-bold mt-2"}
                            >
                                City
                            </InputLabel>
                            <Select
                                sx={{
                                    label: { color: "#1565c0" },
                                }}
                                className={"bg-blue-50 border-0"}
                                required
                                fullWidth
                                onChange={(e) =>
                                    setUserData({
                                        ...userData,
                                        city: e.target.value,
                                    })
                                }
                                value={userData.city}
                                labelid="select-city"
                                id="city"
                                name="city"
                            >
                                {cities.map((item, i) => (
                                    <MenuItem key={i} value={item.name}>
                                        {item.name}
                                    </MenuItem>
                                ))}
                            </Select>
                            <InputLabel
                                id="select-country"
                                className={"text-[#1565c0] font-bold mt-2"}
                            >
                                Country of Origin
                            </InputLabel>
                            <Select
                                sx={{
                                    label: { color: "#1565c0" },
                                }}
                                className={"bg-blue-50 border-0"}
                                required
                                fullWidth
                                onChange={(e) =>
                                    setUserData({
                                        ...userData,
                                        country: e.target.value,
                                    })
                                }
                                value={userData.country}
                                labelid="select-country"
                                id="country"
                                name="country"
                            >
                                {countries.map((item, i) => (
                                    <MenuItem key={i} value={item.name}>
                                        {item.name}
                                    </MenuItem>
                                ))}
                            </Select>
                            <InputLabel
                                id="select-birthdate"
                                className={"text-[#1565c0] font-bold mt-3"}
                            >
                                Birthdate
                            </InputLabel>
                            <TextField
                                sx={{
                                    label: { color: "#1565c0" },
                                }}
                                className={"bg-blue-50 border-0 mt-0"}
                                labelid="select-birthdate"
                                required
                                fullWidth
                                onChange={(e) =>
                                    setUserData({
                                        ...userData,
                                        birthdate: e.target.value,
                                    })
                                }
                                value={userData.birthdate}
                                type="date"
                                id="birthdate"
                                name="birthdate"
                                InputLabelProps={{ shrink: true }}
                            />
                            <div>
                                <FormControl>
                                    <FormLabel
                                        className={
                                            "text-[#1565c0] mt-2 font-bold"
                                        }
                                        sx={{
                                            color: "#1565c0",
                                            fontWeight: "700",
                                        }}
                                        id="demo-row-radio-buttons-group-label"
                                    >
                                        Sex
                                    </FormLabel>
                                    <RadioGroup
                                        row
                                        aria-labelledby="demo-row-radio-buttons-group-label"
                                        name="row-radio-buttons-group"
                                        onChange={(e) =>
                                            setUserData({
                                                ...userData,
                                                sex: e.target.value,
                                            })
                                        }
                                        value={userData.sex}
                                    >
                                        <FormControlLabel
                                            className={"text-[#1565c0]"}
                                            value="female"
                                            control={<Radio />}
                                            label="Female"
                                        />
                                        <FormControlLabel
                                            className={"text-[#1565c0]"}
                                            value="male"
                                            control={<Radio />}
                                            label="Male"
                                        />
                                        <FormControlLabel
                                            className={"text-[#1565c0]"}
                                            value="others"
                                            control={<Radio />}
                                            label="Prefer not to say"
                                        />
                                    </RadioGroup>
                                </FormControl>
                            </div>
                            <InputLabel
                                id="select-password"
                                className={"text-[#1565c0] font-bold mt-2"}
                            >
                                Password
                            </InputLabel>
                            <TextField
                                sx={{
                                    label: { color: "#1565c0" },
                                }}
                                className={"bg-blue-50 mt-0"}
                                required
                                fullWidth
                                onChange={(e) =>
                                    setUserData({
                                        ...userData,
                                        password: e.target.value,
                                    })
                                }
                                value={userData.password}
                                name="password"
                                type="password"
                                labelid="select-password"
                                id="password"
                                InputLabelProps={{ shrink: true }}
                            />
                            <FormControlLabel
                                className={"text-[#1565c0] text-xs"}
                                value="end"
                                control={
                                    <Checkbox
                                        onChange={(e) => {
                                            setUserData({
                                                ...userData,
                                                informedConsent: e.target.value,
                                            });
                                        }}
                                    />
                                }
                                label={
                                    <Typography variant="body3" color="primary">
                                        Bullyid Indonesia provides a national
                                        Helpline service that facilitates mental
                                        health and psychological counselling,
                                        information sharing and referral
                                        services for refugees and asylum
                                        seekers. Participation is completely
                                        voluntary and will not affect your
                                        access to humanitarian assistance in any
                                        way. I agree to participate in this
                                        helpline service voluntarily. I
                                        understand and agree that my answers,
                                        including personal data, will be
                                        collected, used and otherwise processed
                                        for the provision of psychosocial
                                        assistance and counselling offered by
                                        Bullyid Indonesia. I understand that my
                                        personal data will be collected, used,
                                        retained and otherwise processed by
                                        Bullyid Indonesia. The collected data
                                        will be encrypted and will be kept
                                        confidential. The data will only be
                                        disclosed to Bullyid Indonesia
                                        authorized staff members. No personal
                                        data will be shared with third parties.
                                        By clicking this box, I hereby authorize
                                        Bullyid Indonesia to collect, use,
                                        disclose and otherwise process my
                                        personal data obtained through this
                                        helpline service. For any questions,
                                        requests or complaints concerning your
                                        personal data, please contact Bullyid
                                        Indonesia at legal@bullyid.org.
                                    </Typography>
                                }
                                labelPlacement="end"
                            />
                            <FormControlLabel
                                className={"text-[#1565c0] text-xs"}
                                value="end"
                                control={
                                    <Checkbox
                                        onChange={(e) => {
                                            setUserData({
                                                ...userData,
                                                informedAddress: e.target.value,
                                            });
                                        }}
                                    />
                                }
                                label={
                                    <Typography variant="body3" color="primary">
                                       I understand that if I am actively experiencing hallucinations and delusional thinking or experiencing a mental health crisis that cannot be addressed remotely, it may be determined that tele-mental health services are insufficient, and a higher level of professional mental health care is required.
                                    </Typography>
                                }
                                labelPlacement="end"
                            />
                            <FormControlLabel
                                className={"text-[#1565c0] text-xs"}
                                value="end"
                                control={
                                    <Checkbox
                                        onChange={(e) => {
                                            setUserData({
                                                ...userData,
                                                informedLimitation: e.target.value,
                                            });
                                        }}
                                    />
                                }
                                label={
                                    <Typography variant="body3" color="primary">
                                        I understand that there are certain limitations, benefits, and consequences associated with tele-mental health, including but not limited to disruption of transmission by technology failures and/or limited ability to respond to emergencies.
                                    </Typography>
                                }
                                labelPlacement="end"
                            />
                            <LoadingButton
                                type="button"
                                onClick={() => {
                                    handleRegister();
                                }}
                                loading={loading}
                                fullWidth
                                variant="contained"
                                sx={{ mt: 3, mb: 2 }}
                            >
                                Sign Up
                            </LoadingButton>
                            <div className={"text-center"}>
                                <Link to={"/login"} className={"text-blue-500"}>
                                    Already have an account?
                                </Link>
                            </div>
                        </Box>
                    </Box>
                </Container>
            </Guest>
        </>
    );
};
export default Register;
