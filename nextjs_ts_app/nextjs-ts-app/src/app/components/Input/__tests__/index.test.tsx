// @ts-check

import '@testing-library/jest-dom';
import { fireEvent, render, screen } from "@testing-library/react";
import { Input } from '../index';

describe('Input', () => {

    const setup = () => {
        const handler = jest.fn();

        const utils = render(<Input 
            type="text"
            label="My label"
            placeholder="My placeholder"
            defaultValue=""
            handleChange={handler}
        />)
        const input = screen.getByLabelText('My label') as HTMLInputElement;
        // Assertion (приведение типов), так как мы уверены, что здесь будет input-элемент, а тип по умолчанию HTMLElement не содержит свойства value, необходимого нам в 3м тесте

        return {
            input,
            handler,
            ...utils,
        };
    };

    it('Should match snapshot', () => {
        const { container } = setup();

        expect(container).toMatchSnapshot();
    })

    it('Should render a label', () => {
        setup();
        const label = screen.getByText('My label');

        expect(label).toBeInTheDocument();
    })

    // https://testing-library.com/docs/example-input-event/ - хороший пример теста другого Input-компонента

    it('Should be changeable and call handler on change', () => {
        const { input, handler } = setup();
        fireEvent.change(input, {
            target: {
                value: 'New value'
            }
        });

        expect(input.value).toBe('New value');
        expect(handler).toHaveBeenCalled();
        expect(handler).toHaveBeenCalledWith('New value');
    })
})
