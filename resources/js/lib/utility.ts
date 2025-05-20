export const cleanObj = (obj: { [key: string]: any }) => {
    let clean: typeof obj = {};
    for (let key in obj) {
        if (obj[key] !== undefined && obj[key] !== "" && obj[key] !== null) {
            clean[key] = obj[key];
        }
    }
    return clean;
};

export const sleep = (n: number) => {
    return new Promise<void>((resolve) => {
        setTimeout((): void => resolve(), n);
    });
};

export const objFilter = <T extends Record<string, any>>(
    obj: T,
    cb: (entry: [key: keyof T, value: T[keyof T]]) => boolean
): Partial<T> => {
    return Object.fromEntries(Object.entries(obj).filter(cb)) as Partial<T>;
};

export const objMap = <T extends Record<string, any>, R>(
    obj: T,
    fn: (value: T[keyof T], key: keyof T) => R
): { [K in keyof T]: R } => {
    const result = {} as { [K in keyof T]: R };

    for (const key in obj) {
        result[key] = fn(obj[key], key);
    }

    return result;
};
