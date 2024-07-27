export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
}

export interface Project {
    description: string;
    id: number;
    image: string;
    source: string;
    tags: [];
    title: string;
    visit: string;
    created_at: Date;
    updated_at: Date;
    deleted_at: Date;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>
    > = T & {
    projects: Project[];
    auth: {
        user: User;
    };
};
