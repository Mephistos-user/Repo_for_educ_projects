import '@testing-library/jest-dom';
import { render } from '@testing-library/react';
import { Header } from '../index';

// jest.mock('next/navigation', () => require('next-router-mock'));

jest.mock('next/navigation', () => {
    return {
        useRouter: () => {}
    };
    // push: jest.fn
});

describe('Header', () => {
    it('render the component', () => {
        const { container } = render(<Header />);

        expect(container).toMatchSnapshot();
    });
})