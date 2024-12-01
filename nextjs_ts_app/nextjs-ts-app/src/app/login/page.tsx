"use client"
import { useRouter } from "next/navigation";
import { useState } from "react";

import { Alert } from "../components/Alert";
import { Button } from "../components/Button";
import { Input } from "../components/Input";

export default function Login() {
    const router = useRouter();

    const [login, setLogin] = useState<string>("login");
    const [password, setPassword] = useState<string>("Password");

    const [showAlert, setShowAlert] = useState<'info' | 'error' | 'success' | null>(null);

    const onSubmit = async (ev: React.FormEvent<HTMLFormElement>): Promise<void> => {
        ev.preventDefault();
        try {
            const response = await fetch("/api/auth/login", {
                method: "POST",
                body: JSON.stringify({
                    login,
                    password
                }),
            });
            if (!response.ok) {
                setShowAlert("error");
                throw new Error("HTTP error! status: " + response.status);
            }
            const result = await response.json();
            console.log('Success: ', result)
            setShowAlert('success')
        } catch (error)
        {
            setShowAlert("error");
            console.error("Failed to login:", error);
        }
    }

    return (
        <form method="POST" autoComplete="off" onSubmit={onSubmit}>
            {showAlert &&
            <Alert type={showAlert}>
                {`Auth status is: ${showAlert}`}
            </Alert>
            }
            <Input
                type="text"
                label="Your login"
                placeholder="Login"
                defaultValue="login"
                handleChange={(str) => setLogin(str)}
            />
            <Input
                type="password"
                label="Your password"
                placeholder="Password"
                defaultValue="Password"
                handleChange={(str) => setPassword(str)}
            />
            <Button text="Sign in" />
        </form>
    )
}