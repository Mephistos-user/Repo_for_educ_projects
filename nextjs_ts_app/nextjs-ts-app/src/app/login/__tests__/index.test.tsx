import '@testing-library/jest-dom';
import { render } from '@testing-library/react';
import Login from '../page';

const setup = () => {
    const handler = jest.fn();

    const utils = render(<Login />);
    // Assertion (приведение типов), так как мы уверены, что здесь будет input-элемент, а тип по умолчанию HTMLElement не содержит свойства value, необходимого нам в 3м тесте
    
    return {
        handler,
        ...utils,
    }
}

// jest.mock('next/navigation', () => require('next-router-mock'));
jest.mock('next/navigation', () => {
    return {
        useRouter: () => {}
    };
    // push: jest.fn
});

describe('Login Page', () => {
    it('Should match snapshot', () => {
        const { container } = setup();

        expect(container).toMatchSnapshot();
    });
})