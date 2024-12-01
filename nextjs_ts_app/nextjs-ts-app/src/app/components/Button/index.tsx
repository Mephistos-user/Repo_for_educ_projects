"use client"

import React, { ReactNode } from "react";

interface IProps {
    text: ReactNode;
    handleClick?: (ev: React.MouseEvent<HTMLButtonElement>) => void;
};

export const Button = ({ text, handleClick}: IProps): JSX.Element => {
    return (
        <div className="mt-8">
            <button
                onClick={handleClick}
                type="submit"
                className="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-600"
            >
                {text}
            </button>
        </div>
    )
}