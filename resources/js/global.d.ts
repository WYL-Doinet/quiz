
import { AxiosInstance } from "axios";
import ziggyRoute, { Config as ZiggyConfig } from "ziggy-js";
import { ComponentCustomProperties } from 'vue';
import { I18n } from 'vue-i18n';



export {};

declare global {
    interface Window {
        axios: AxiosInstance;
    }

    var route: typeof ziggyRoute;
    var Ziggy: ZiggyConfig;
}

interface InertiaAppProps {
    flash: {
        success: string;
        error: string;
    };
}

declare module "@inertiajs/core" {
    interface PageProps extends InertiaAppProps {}
    interface ComponentCustomProperties {
    $t: I18n['global']['t'];
  }
}

declare module "vue" {
    interface ComponentCustomProperties {
        route: typeof ziggyRoute;
    }
}