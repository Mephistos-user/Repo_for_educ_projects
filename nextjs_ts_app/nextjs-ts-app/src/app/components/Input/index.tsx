"use client"

import { useState } from "react";
interface IProps {
    type: 'text' | 'email' | 'password';
    label: string;
    defaultValue: string;
    placeholder: string;
    handleChange: (str: string) => void;
}

export const Input = ({
    type,
    label,
    defaultValue,
    placeholder,
    handleChange
}: IProps): JSX.Element => {
    const [value, setValue] = useState<string>(defaultValue);

    const onChange = (ev: React.ChangeEvent<HTMLInputElement>): void => {
        setValue(ev.target.value);
        handleChange(ev.target.value);
    };

    return (
        <div className="mt-8">
            <label className="block mb-2 text-sm font-medium to-gray-900 dark:text-white">
                {label}
            </label>
            <input
                required
                type={type}
                name="email"
                id="email"
                className="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600"
                placeholder={placeholder}
                value={value}
                onChange={onChange}
            />
        </div>
    );
}