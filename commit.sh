time=$(date +%Y_%m_%d_%H_%i_%s)
git pull origin master
git status
git add -A
git commit -m $(time)"update"
git tag -a ${time} -m "package code on "$(date +%Y_%m_%d)
git push origin master