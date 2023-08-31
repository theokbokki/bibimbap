## Starting a Bibimbap project

### Prerequisites
- [PNPM](https://pnpm.io/installation) installed
- [Tauri's prerequisites](https://tauri.app/v1/guides/getting-started/prerequisites)
- [Laravel's prerequisites](https://laravel.com/docs/10.x/installation#your-first-laravel-project)
- Whatever your framework's prerequisites are (generally this means having a package manager and node 16+ installed).

> [!WARNING]  
> Only Nuxt is supported as of now, other frameworks will come soon.

### How to
1. Download the lastest binary from the [CLI repo](https://github.com/theokbokki/bibimbap-cli).
2. (Optional) Add it to your path for easy access.
3. Go to the directory where you want to create your new project, run bibimbap and follow the instructions.
4. Go to `apps/web` folder and create a `.env` file.
5. Run `valet link` in the `apps/web` folder. (Or whatever your way of setting up Laravel is).
6. Go to the root of your project and run `pnpm install`.
7. Still at the root of your project, run `pnpm dev`.

🎉 You should be good to go! 🎉
