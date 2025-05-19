export const cleanObj = (obj: { [key: string]: any }) => {
    let clean: typeof obj = {};
    for (let key in obj) {
        if (obj[key] !== undefined && obj[key] !== "" && obj[key] !== null) {
            clean[key] = obj[key];
        }
    }
    return clean
};
